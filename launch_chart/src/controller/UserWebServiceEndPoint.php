<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\controller;

use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\router\RequestMappingImpl;
use MvcProject\Mruruc\exceptions\UserNotFoundException;
use MvcProject\Mruruc\model\User;
use MvcProject\Mruruc\service\UserService;

class UserWebServiceEndPoint extends RequestMappingImpl{
    private UserService $userService;

    public function __construct(){
        $this->userService=new UserService();
    }
    public function getMapping(Request $request, Response $response){
        $userId=isset($request->getRequestBody()->getData()["userId"])
                    ?(int)$request->getRequestBody()->getData()["userId"]:null ;

        $response->setHeader("Content-Type","application/json");            

        if($userId){

          try{
            $response->setStatusCode(200);
            echo json_encode($this->userService->getUserById($userId));
          }catch(UserNotFoundException $userNotFoundException){
            $response->setStatusCode(404);
            echo json_encode(["message"=>$userNotFoundException->getMessage()]);
          }

        }
        else{
            $response->setStatusCode(200);
            echo json_encode($this->userService->getAllUsers());
        }
    }

    public function deleteMapping(Request $request,Response $response):void{
        $userId=isset($request->getRequestBody()->getData()["userId"])
        ?(int)$request->getRequestBody()->getData()["userId"]:null ;

        $response->setHeader("Content-Type","application/json");

        if($userId){
          try{
            $deletedUser= $this->userService->delete($userId);
            $response->setStatusCode(200);
            echo json_encode(["message"=>"User deleted with id: ".$deletedUser->getUserId()]);
          }catch(UserNotFoundException $userNotFoundException){
            $response->setStatusCode(404);
            echo json_encode(["message"=>$userNotFoundException->getMessage()]);
          }
        }
        else{
          $response->setStatusCode(400);
          echo json_encode(["message"=>"User Id is required"]);
        }

    }
}
?>


