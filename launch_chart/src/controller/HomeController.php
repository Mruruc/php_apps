<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\controller;

use Dotenv\Dotenv;
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\router\RequestMappingImpl;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
class HomeController extends RequestMappingImpl{

    public function __construct(){}

    public function getMapping(Request $request,Response $response){
        $data=$this->getCoinInfo();        
        $response->getViewRenderer()->render(__DIR__ . "/../views/home/index.php",$data);
    }

     function getCoinInfo() {
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://pro-api.coinmarketcap.com/v2/cryptocurrency/info?id=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-CMC_PRO_API_KEY:".$_ENV['API_KEY']
            ],
        ]);
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
        curl_close($curl);
    
        
        if ($err) {
            return ['error' => $err];
        } else if ($httpcode != 200) {
            return ['error' => "HTTP error! status: $httpcode"];
        } else {
            // Decode JSON response and return
            $arrayOfData= json_decode($response, true);
            return $arrayOfData["data"]["1"];
        }
    }
 
    
}
?>