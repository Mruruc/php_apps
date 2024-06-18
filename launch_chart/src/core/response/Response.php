<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\response;

use MvcProject\Mruruc\core\viewRenderer\ViewRenderer;

class Response{
    private ViewRenderer $viewRenderer;
    public function __construct(int $statusCode=200,string $contentType="text/html"){
        $this->viewRenderer=new ViewRenderer();
        $this->setStatusCode($statusCode);
        $this->setHeader("Content-Type","text/html");
    }

    public function getViewRenderer():ViewRenderer{
        return $this->viewRenderer;
    }

    public function setStatusCode(int $statusCode):void{
        http_response_code($statusCode);
    }

    public function setHeader(string $name,string $value):void{
        header("$name: $value");
    }

    
    public static function redirect(string $url):void{
        header("Location: $url");
    }



}
?>