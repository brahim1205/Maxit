<?php

namespace App\Src\Controller;

use App\Core\Abstract\AbstractController;

class BaseController extends AbstractController
{
     public function index(){}
     public function edit(){}
     public function destroy(){}
     public function store(){}
     public function show()
     {
        $this->renderHtml('dashboard/acceuil.html.php');
     }
     public function create(){}
     public function delete(){}
     public function login(){}
     public function register(){}
}
