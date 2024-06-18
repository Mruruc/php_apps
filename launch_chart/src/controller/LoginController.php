<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\controller;

use MvcProject\Mruruc\auth\UserAuth;
use MvcProject\Mruruc\exceptions\LoginExceptions;
use MvcProject\Mruruc\model\User;
use MvcProject\Mruruc\service\LoginService;
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\util\Util;
use MvcProject\Mruruc\core\router\RequestMappingImpl;

class LoginController extends RequestMappingImpl{
    private LoginService $loginService;

    public function __construct(){
        $this->loginService=new LoginService();
    }


    public function getMapping(Request $request,Response $response){
        $response->getViewRenderer()->render(__DIR__ . "/../views/user/login.php");
    }
    

    public function postMapping(Request $request,Response $response){
        $errorMessage=null;
        try{
           
            $postData=$request->getRequestBody()->getData();
            $user=new User();
            $user->setUserName($postData["userName"]);
            $user->setPassword($postData["password"]);

            $userDb= $this->loginService->login($user); 
        
            UserAuth::startSession();
            $_SESSION["userName"]=Util::extractTheUserNameFromEmail($userDb->getUserName());
            $_SESSION["userEmail"]=$userDb->getUserName();
            $_SESSION["userId"]=$userDb->getUserId();
            $_SESSION['logged_in'] = true; 

            Response::redirect("./account");
            
         }catch(LoginExceptions $ex){
             $errorMessage=$ex->getMessage();
             $response->setStatusCode(401);
             if(isset($_SESSION['logged_in']) ){
                session_unset();
                session_destroy();
             }
             $response->getViewRenderer()->render(__DIR__ . "/../views/user/login.php", [
                 "errorMessage" => $errorMessage,
                 "userName" => $_POST["userName"] 
             ]);
         }

    }


    public function putMapping(Request $request,Response $response){
        UserAuth::logout();
       // Response::redirect("./login");
       echo json_encode(["message"=>"You have been logged out!"]);
    }
}
?>