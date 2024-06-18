<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\router;

use MvcProject\Mruruc\core\exceptions\NotSupportedRequestMethodException;
use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;
use MvcProject\Mruruc\core\router\RequestMapping;

 class RequestMappingImpl implements RequestMapping{
    public function __construct() {}

    public function handleHttpRequestResponse(Request $request, Response $response): void {
        $requestMethod = $request->getRequestHeader()->getRequestMethod();
        $requestMethod = trim($requestMethod);
        $requestMethod = strtoupper($requestMethod);
        switch ($requestMethod) {
            case "GET":
                $this->getMapping($request,$response);
                break;
            case "POST":
                $this->postMapping($request,$response);
                break;
            case "PUT":
                $this->putMapping($request,$response);
                break;
            case "DELETE":
                $this->deleteMapping($request,$response);
                break;
            default:
                throw new NotSupportedRequestMethodException("Request method '{$requestMethod}' not supported");
        }
    }

    public function getMapping(Request $request,Response $response){}
    public function postMapping(Request $request,Response $response){}
    public function putMapping(Request $request,Response $response){}
    public function deleteMapping(Request $request,Response $response){}
}
?>