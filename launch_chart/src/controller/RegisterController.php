<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\controller;

use MvcProject\Mruruc\auth\UserAuth;
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\util\Util;
use MvcProject\Mruruc\exceptions\UserExistsException;
use MvcProject\Mruruc\model\User;
use MvcProject\Mruruc\service\UserService;
use MvcProject\Mruruc\core\router\RequestMappingImpl;

class RegisterController extends RequestMappingImpl{
    private UserService $userService;

    public function __construct(){
        $this->userService=new UserService();
    }

    public function getMapping(Request $request, Response $response):void{
        $response->getViewRenderer()->render(__DIR__ . "/../views/user/register.php");
    }

    public function postMapping(Request $request, Response $response):void{
        $postData=$request->getRequestBody()->getData();
          try{
            $user=new User();	
            $user->setUserName($postData["userName"]);
            $user->setPassword($postData["password"]);
            
            $user= $this->userService->saveUser($user);

            UserAuth::startSession();
            $_SESSION["userName"]=Util::extractTheUserNameFromEmail($user->getUserName());
            $_SESSION["userEmail"]=$user->getUserName();
            $_SESSION["userId"]=$user->getUserId();
            $_SESSION['logged_in'] = true; 

            Response::redirect("./account");
                      
          }catch(UserExistsException $ex){
            $response->setStatusCode(400);
            $response
                    ->getViewRenderer()
                    ->render(__DIR__ . "/../views/user/register.php",["errorMessage"=>$ex->getMessage()]);

          }
          
    }
    
}
?>