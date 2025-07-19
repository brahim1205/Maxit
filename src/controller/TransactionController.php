<?php

namespace App\Src\Controller;

use App\Core\Abstract\AbstractController;

class TransactionController extends AbstractController
{
    
     public function index(){}
     public function edit(){}
     public function destroy(){}
     public function store()
     {
        $this->renderHtml('dashboard/transaction.html.php');
     }
     public function show(){}
     public function create(){}
     public function delete(){}
     public function login(){}
     public function register(){}
}
