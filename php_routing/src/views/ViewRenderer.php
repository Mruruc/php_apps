<?php
declare(strict_types=1);
namespace Mruruc\views;

class ViewRenderer{
    
    public function render(string $viewPath,array $data=[]){
        extract($data);
        include $viewPath;
    }
}
?>