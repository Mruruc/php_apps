<?php
   declare(strict_types=1);
   
   namespace MvcProject\Mruruc\repository;

   interface CrudRepository{

    public function findAll():array;
    public function findById(int $entityId):object;
    public function save(object $entityInstance):object;
    public function delete(int $entityId):object;
    public function update(int $userId, object $entityInstance):object;
    
   }
?>