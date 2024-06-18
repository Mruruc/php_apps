<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\core\viewRenderer;

class ViewRenderer{

    public function __construct(){}

    public function render(string $viewPath,array $data=[]){
        extract($data);
        include $viewPath;
    }
}
?>