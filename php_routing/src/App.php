<?php
namespace Mruruc\PhpRouting;

class App{
    protected $controller ="HomeController";
    protected $method = "index";
    protected $params= [];

    public function __construct(){
        $url=$this->parseUrl();
    }

    protected function parseUrl(){
        if(isset($_GET['url'])){

        }
    }
}
?>