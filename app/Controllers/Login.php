<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller {
    public function index() {
        // include helper form
        helper(['form']);
        echo view('login');
    }

    public function auth() {
        $session = session();
        $model = new UserModel();
        $musername = $this->request->getVar('musername');
        $mpassword = $this->request->getVar('mpassword');
        $data =
         $model->where('musername', $musername)
         ->where('mpassword', $mpassword)
         ->first();
        if ($data) {
                $ses_data = [
                    'mid' => $data['mid'],
                    'name' => $data['name'],
                    'dep' => $data['dep'],
                    'mlevel' => $data['mlevel'],
                    'picture' => $data['picture'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง');
            return redirect()->to('/login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}