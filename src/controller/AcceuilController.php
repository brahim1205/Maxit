<?php

namespace App\Src\Controller;

use App\Core\Abstract\AbstractController;

class AcceuilController extends AbstractController
{
    
     public function index()
     {
         // require_once '../template/dashboard/ClientDashboard.html.php';
          $this->renderHtml('dashboard/ClientDashboard.html.php');

     }
     public function edit(){}
     public function destroy(){}
     public function store(){}
     public function show(){}
     public function create(){}
     public function delete(){}
     public function login(){}
     public function register(){}
}
