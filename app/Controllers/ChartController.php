<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CharModel;
use CodeIgniter\I18n\Time;

class ChartController extends Controller{

   private $charModel;
   public function __construct()
   {
    $this->charModel = new CharModel();  
   }

    public function chart01()   {
          
      $myTime = new Time('now');
      $data['getyear'] = $myTime->getYear(); 
      echo view('backend/chart/01',$data);
    }

    public function getDataChart01()
    {
      $year = $this->request->getVar('year');
      $this->charModel->dataChar01($year); 

    }



}