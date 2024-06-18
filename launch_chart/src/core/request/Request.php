<?php
namespace MvcProject\Mruruc\core\request;

class Request{
    private RequestHeader $requestHeader;
    private RequestBody $requestBody;
    private array $attributes=[];

    public function __construct(RequestHeader $requestHeader,RequestBody $requestBody){
        $this->requestHeader=$requestHeader;
        $this->requestBody=$requestBody;
    }

    public function getRequestHeader():RequestHeader{
        return $this->requestHeader;
    }

    public function getRequestBody():RequestBody{
        return $this->requestBody;
    }

    public function getAttribute(string $key){
        return $this->attributes[$key] ?? null;
    }
    
    public function setAttribute(string $key, $value):void{
        $this->attributes[$key]=$value;
    }

}
?>