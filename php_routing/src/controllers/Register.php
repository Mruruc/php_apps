<?php
declare(strict_types=1);

namespace Mruruc\controller;

use Mruruc\views\ViewRenderer;

class RegisterController{
    private ViewRenderer $viewRenderer;

    public function __construct(ViewRenderer $viewRenderer){
        $this->viewRenderer=$viewRenderer;
    }

    public function index(){
        $this->viewRenderer->render(__DIR__ ."/../views/Register.php");
    }

}

?>