<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\USerModel;

class Dashboard extends Controller{

    public function index()   {
       $usercount = new USerModel();
       $data['usercount'] =  $usercount->countAllResults();
   
      echo view('includes/header');
      echo view('backend/partials/home',$data);
      echo view('includes/footer');
    }

}