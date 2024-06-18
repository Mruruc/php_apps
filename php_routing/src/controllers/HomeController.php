<?php
declare(strict_types=1);

namespace Mruruc\controller;
use Mruruc\views\ViewRenderer;

class HomeController{
    private ViewRenderer $viewRenderer;

    public function __construct(ViewRenderer $viewRenderer){
        $this->viewRenderer=$viewRenderer;
    }

    public function index(){
        $data=['pageTitle'=>'Home Page','message'=>'Welcome to our Website :)'];
        $this->viewRenderer->render(__DIR__ ."/../views/Home.php",$data);
    }
}
?>