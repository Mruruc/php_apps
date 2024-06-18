<?php
namespace PhpPdo\Mruruc\repository;
use PhpPdo\Mruruc\model\Product;

   interface CRUD{
        public function save(Product $product);
        public function findAll();
        public function update();
        public function delete(int $productId);
   }
?>