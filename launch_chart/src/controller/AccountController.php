<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\controller;

use MvcProject\Mruruc\auth\UserAuth;
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\router\RequestMappingImpl;

class AccountController extends RequestMappingImpl{

    public function getMapping(Request $request,Response $response):void{
        if(UserAuth::isUserLoggedIn()){
            $response->getViewRenderer()
                         ->render(__DIR__ . "/../views/account/account.php");
        }
        else{
            $response->setStatusCode(401);
            $response->getViewRenderer()
                         ->render(__DIR__ . "/../views/user/login.php", [
                             "errorMessage" => "You are not logged in. Please login to access your account."
                         ]);
        }
    }

    public function postMapping(Request $request,Response $response):void{
       $data=$request->getRequestBody()->getData();
       $coinInfo=$this->getCoinInfo(isset($data['id'])) ? $data['id'] : [];
       $response->getViewRenderer()->render(__DIR__ . "/../views/account/account.php",$coinInfo);
    }

    function getCoinInfo($id) {
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://pro-api.coinmarketcap.com/v2/cryptocurrency/info?id=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-CMC_PRO_API_KEY: 45bd944e-f2f7-4038-8bf8-fd8ce58b207a"
            ],
        ]);
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
        curl_close($curl);
    
        
        if ($err) {
            return ['error' => $err];
        } else if ($httpcode != 200) {
            // Handle HTTP error response
            return ['error' => "HTTP error! status: $httpcode"];
        } else {
            // Decode JSON response and return
            $arrayOfData= json_decode($response, true);
            return $arrayOfData["data"]["1"];
        }
    }
}

?>