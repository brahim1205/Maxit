<?php

namespace App\Src\Controller;

use App\Core\Abstract\AbstractController;

class CommercialController extends AbstractController
{
    
     public function index(){}
     public function edit()
     {
        require_once '../template/dashboard/CommercialDashboard.html.php';
     }
     public function destroy(){}
     public function store(){}
     public function show(){}
     public function create(){}
     public function delete(){}
     public function login(){}
     public function register(){}
}
