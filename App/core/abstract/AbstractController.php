<?php

namespace App\Core\Abstract;

use App\Core\Session;

abstract class  AbstractController
{
    protected $layout = "base";
    protected Session $session;

    abstract public function index();
    abstract public function edit();
    abstract public function destroy();
    abstract public function store();
    abstract public function show();
    abstract public function create();

    public function renderHtml(string $view = "", array $data = [])
    {
        extract($data);

        ob_start();
        require_once "../template/" . $view;

        $contentForLayout = ob_get_clean();

        require_once "../template/layout/" . $this->layout . '.layout.php';
    }
}
