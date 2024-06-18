<?php
declare(strict_types=1);

namespace Mruruc\Router;

require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/AboutController.php';
require_once __DIR__ . '/../controllers/ContactController.php';
require_once __DIR__ . '/../controllers/ControllerNotFound.php';
require_once __DIR__ . '/../controllers/Register.php';
require_once __DIR__ . '/../views/ViewRenderer.php';


use Mruruc\controller\{HomeController,AboutController,
                       ContactController,ControllerNotFound,
                       RegisterController};
use Mruruc\views\ViewRenderer;

class Router{

    private function __construct(){}

    

    public static function route($page){

        $viewRenderer=new ViewRenderer();

        switch ($page) {
            case 'home': 
                $controller= new HomeController($viewRenderer);
                $controller->index();
            break;
            case 'about': 
                $controller =new AboutController();
                $controller->index();
            break;
            case 'contact': 
                $controller=new ContactController();
                $controller->index();
            break;
            case 'register': 
                $controller=new RegisterController($viewRenderer);
                $controller->index();
            break;
            default: 
            $controller=new ControllerNotFound();
            $controller->index();
        }
        
    }
}
?>