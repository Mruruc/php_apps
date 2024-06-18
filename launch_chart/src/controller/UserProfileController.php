<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\controller;

use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\util\Util;
use MvcProject\Mruruc\model\User;
use MvcProject\Mruruc\service\UserService;
use Exception;
use MvcProject\Mruruc\auth\UserAuth;
use MvcProject\Mruruc\core\router\RequestMappingImpl;
use MvcProject\Mruruc\exceptions\UserNotFoundException;

class UserProfileController extends RequestMappingImpl{
    private UserService $userService;

    public function __construct(){
        $this->userService=new UserService();
    }

    public function getMapping(Request $request, Response $response){
        if(UserAuth::isUserLoggedIn()){
            $response->getViewRenderer()->render(__DIR__ . "/../views/account/userProfile.php");
        }
        else{
            $response->setStatusCode(401);
            Response::redirect("./login");
        }
    }


    public function postMapping(Request $request, Response $response):void{
       $data= $request->getRequestBody()->getData();
       $userId=isset($data["userId"])?(int)$data["userId"]:null;
       $newUserName=isset($data["newUserName"])?$data["newUserName"]:null;
       $newPassword=isset($data["newPassword"])?$data["newPassword"]:null;
       $confirmPassword=isset($data["confirmPassword"])?$data["confirmPassword"]:null;

       try{
            $user=new User();
            $newUserName && $user->setUserName($newUserName);
            $newPassword && $user->setPassword($newPassword);
            $updatedUser=$this->userService->update($userId,$user);

            $response->setStatusCode(200);

            // update the session

            UserAuth::startSession();
            $_SESSION["userName"] = Util::extractTheUserNameFromEmail($updatedUser->getUserName());
            $_SESSION["userEmail"] = $updatedUser->getUserName();
            $_SESSION["userId"] = $updatedUser->getUserId();
            $_SESSION['logged_in'] = true;
    
            Response::redirect("./profile");
            

       }catch(Exception $ex){
            $response->setStatusCode(400);
            $response->getViewRenderer()->render(__DIR__ . "/../views/account/userProfile.php",["errorMessage"=>$ex->getMessage()]);
       }
    }

    public function deleteMapping(Request $request,Response $response):void{
        $userId=isset($request->getRequestBody()->getData()["userId"])
        ?(int)$request->getRequestBody()->getData()["userId"]:null ;

        $response->setHeader("Content-Type","application/json");

        if($userId){
          try{
            $deletedUser= $this->userService->delete($userId);
            // destroy the session and unset
            UserAuth::logout();

            $response->setStatusCode(200);
            echo json_encode(["message"=>"Successful"]);

          }catch(UserNotFoundException $userNotFoundException){
            $response->setStatusCode(404);
            echo json_encode(["message"=>$userNotFoundException->getMessage()]);
          }
          exit;
        }

        $response->setStatusCode(400);
        echo json_encode(["message"=>"User Id is required"]);
    }
}
?>