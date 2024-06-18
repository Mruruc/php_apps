<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\controller;

use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\router\RequestMappingImpl;

class NotFoundController extends RequestMappingImpl{

    public function __construct(){}

    public function getMapping(Request $request,Response $response){
        $response->setStatusCode(404);
        $response->getViewRenderer()->render(__DIR__ . "/../views/not-found.php");
    }
}
?>