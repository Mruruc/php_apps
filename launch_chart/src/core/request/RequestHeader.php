<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\request;

class RequestHeader{
    private array $headers;
    private string $requestMethod;
    private string $requestURI;

    public function __construct(string $requestMethod,string $requestURI) {
        $this->headers = $this->getAllHeaders();
        $this->requestMethod=$requestMethod;
        $this->requestURI=$requestURI;
    }

    public function getHeaders():array{
        return $this->headers;
    }
    public function getRequestMethod(){
        return $this->requestMethod;
    }
    public function getRequestURI():string{
        return $this->requestURI;
    }

    private function getAllHeaders(): array {
        if (!function_exists('getallheaders')) {
           
            $headers = [];
            foreach ($_SERVER as $name => $value) {
                if (substr($name, 0, 5) == 'HTTP_') {
                    $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
                }
            }
            return $headers;
        }
        return getallheaders();
    }

    public function getHeader(string $name): ?string {
        return $this->headers[$name] ?? null;
    }

    public function setHeader(string $name, string $value): void {
        $this->headers[$name] = $value;
    }
}
?>