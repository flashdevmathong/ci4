<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;



class UserController extends Controller 
{
    private $listDep = array(array('1','ตลาด'),array('2','วิศวกรรม'),array('3','ผลิต'),array('4','บัญชี'),array('5','โฟร์แมน'),array('6','ไอที')); 
    private $usermodel;
    private $session;
    private $rules = [
        'name' => 'required|min_length[3]|max_length[20]',
        'surname' => 'required|min_length[3]|max_length[20]',
        'musername' => 'required|min_length[3]|max_length[20]',
        'mpassword' => 'required|min_length[3]|max_length[20]',   
        'email' => 'valid_email',
        'picture' => ['mime_in[picture,image/jpg,image/jpeg,image/gif,image/png]',
            'max_size[picture,4096]',
        ]];
        

    public function __construct()
    {
        $this->usermodel = new userModel();
        $this->session = \Config\Services::session();
    }

    public function index($data = null)
     {
        $query =  $this->usermodel->get();
        $data['userlist'] =  $query->getResult();
        echo view('includes/header');
        echo view('backend/partials/user/show', $data);
        echo view('includes/footer');
    }

    public  function add($data = null)
    {
        helper(['form']);
        $data['listdep'] = $this->listDep;
        echo view('includes/header');
        echo view('backend/partials/user/add',$data);
        echo view('includes/footer');

    }

    public function store()
    {
    
        // $update = new UploadController();   
        helper(['form']);
        if ($this->validate($this->rules)) 
        {
 

         $file = $this->request->getFile('picture');
         if ($file->isValid())
         {
            $picture = $file->getRandomName();
            $file->move('dist/img/',$picture);     
       
         }
         else
         {
            $picture = 'default.png';
         }

         $data = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'musername' => $this->request->getVar('musername'),
            'mpassword' => $this->request->getVar('mpassword'),
            'tel' => $this->request->getVar('tel'),
            'email' => $this->request->getVar('email'),
            'dep' => $this->request->getVar('dep'),
            'mlevel' => $this->request->getVar('mlevel'),
            'picture' => $picture
         ];

         $result = $this->usermodel->insert($data);
          if($result)
          {
            $this->session->setFlashdata('success', 'User Data Added');
             $this->index();
          }
        }
        else
        {
        $data['validation'] = $this->validator;
        $this->add($data);
        }
    }

    public function delete($id)
    {
        $query = $this->usermodel->select('picture')->where('mid',$id)->first();
        if($query['picture'] !== 'default.png')
        {
            unlink('dist/img/'.$query['picture']);
        }

        $this->usermodel->where('mid', $id)->delete();
        $this->session->setFlashdata('success', 'User Data Deleted');
        $this->index();
    }

    public function edit($id,$data = null)
    {
    
        $data['listdep'] = $this->listDep;
        $data['edituser'] = $this->usermodel->where('mid',$id)->first();

        
        echo view('includes/header');
        echo view('backend/partials/user/edit',$data);
        echo view('includes/footer'); 
    }

    public function update()
    {
        helper(['form']);
        $mid = $this->request->getVar('mid');
        $query = $this->usermodel->select('picture')->where('mid',$mid)->first();
        if ($this->validate($this->rules)) 
        {

            $file = $this->request->getFile('picture');
            if ($file->isValid())
            {
                if($query['picture'] !== 'default.png')
                {
                    unlink('dist/img/'.$query['picture']);
                }
                
               $picture = $file->getRandomName();
               $file->move('dist/img/',$picture);     
          
            }
            
            else
            {
               $picture = 'default.png';
            }
            
            $data = [
                'name' => $this->request->getVar('name'),
                'surname' => $this->request->getVar('surname'),
                'musername' => $this->request->getVar('musername'),
                'mpassword' => $this->request->getVar('mpassword'),
                'tel' => $this->request->getVar('tel'),
                'email' => $this->request->getVar('email'),
                'dep' => $this->request->getVar('dep'),
                'mlevel' => $this->request->getVar('mlevel'),
                'picture' => $picture  
             ];


             $this->usermodel->set($data);
             $this->usermodel->where('mid', $mid);
            $result = $this->usermodel->update();  
            if($result)
            {
            $this->session->setFlashdata('success', 'User Data Update');
            $this->index();
           }
        }
        else
        {
        $data['validation'] = $this->validator;
        $this->edit($mid,$data);
        }
    }

    public function exportPdf()
    {
      
        $html =   view('mypdfLayout');
        $mpdf = new \Mpdf\Mpdf(array(
        'mode'              => 'utf-8',
        'default_font'      => 'angsana',
        'default_font_size' => 18,
         ));
		$mpdf->SetFooter('||{PAGENO}');
		$mpdf->WriteHTML($html);
		return redirect()->to($mpdf->Output('filename.pdf','I'));    
    }

    public function exportExcel()
    {

    }
}



    	


 
