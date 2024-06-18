<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\request;

class RequestBody{
    private array $data;

    public function __construct(array $data=[]){
        $this->data=$data;
    }

    public function getData():array{
        return $this->data;
    }
}
?>