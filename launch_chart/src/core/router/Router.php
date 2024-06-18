<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\core\router;


use MvcProject\Mruruc\controller\{AccountController, HomeController, LoginController, NotFoundController, RegisterController, UserProfileController};
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\controller\UserWebServiceEndPoint;

class Router{
   private Request $request;
   private Response $response;

   private array $routes=[];

   public function __construct(Request $request){
        $this->request=$request;
        $this->response=new Response();
   
        $this->routes['home']=new HomeController();
        $this->routes['login']=new LoginController();
        $this->routes['register']=new RegisterController();
        $this->routes['profile']=new UserProfileController();
        $this->routes['logout']=new LoginController();
        $this->routes['account']=new AccountController();

        $this->routes['users']=new UserWebServiceEndPoint();

        $this->routes['notfound']=new NotFoundController();
       
   }

   public function route($path){
    $path=strtolower($path);
    $controller=isset($this->routes[$path]) ? $this->routes[$path] : $this->routes['notfound'];
    $controller->handleHttpRequestResponse($this->request,$this->response);
   }

   
}
?>