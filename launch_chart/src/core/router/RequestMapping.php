<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\router;

use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\response\Response;

interface RequestMapping{
    public function handleHttpRequestResponse(Request $request,Response $response):void;
}
?>