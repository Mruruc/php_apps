<?php 
declare(strict_types=1);


require_once __DIR__ . "/../vendor/autoload.php";


use MvcProject\Mruruc\core\request\Request;
use MvcProject\Mruruc\core\request\RequestBody;
use MvcProject\Mruruc\core\request\RequestHeader;
use MvcProject\Mruruc\core\router\Router;


$page= isset($_REQUEST["url"]) ? htmlspecialchars($_REQUEST["url"]) : 'home';

$request=new Request(
    new RequestHeader($_SERVER["REQUEST_METHOD"],$_SERVER["REQUEST_URI"]),
    new RequestBody($_REQUEST ? $_REQUEST : [])
);

$route=new Router($request);
$route->route($page);

?>