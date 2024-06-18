<?php
namespace PhpPdo\Mruruc\service;

use PDO;
use Exception;
use PhpPdo\Mruruc\repository\CRUD;
use PhpPdo\Mruruc\model\Product;

    class ProductService implements CRUD{
        private PDO $connection; 

        public function __construct(PDO $connection){
            $this->connection=$connection;
        }

        public function save(Product $product){
          try{
           $prepareStmt= $this->connection->prepare("
                       INSERT INTO products(title,price,description,create_date) 
                       VALUES(?,?,?,?) ");
            $prepareStmt->bindValue(1,$product->getTitle(),PDO::PARAM_STR);   
            $prepareStmt->bindValue(2,$product->getPrice(),PDO::PARAM_STR);
            $prepareStmt->bindValue(3,$product->getDesc(),PDO::PARAM_STR);   
            $prepareStmt->bindValue(4,$product->getCreatedDate()->format('Y-m-d H:i:s'),PDO::PARAM_STR);

            return $prepareStmt->execute();

          }catch(Exception $exception){
            throw new Exception("Failed to insert database, Message={$exception->getMessage()}",0,$exception);
          }
        }

        public function findAll(){
           try{
                $prepareStmt=$this->connection->prepare(" SELECT * FROM products ");
                $prepareStmt->execute();
                $prepareStmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,"Product");
                $listOfProducts=$prepareStmt->fetchAll();
                return $listOfProducts;

           }catch(Exception $exception){
            throw new Exception("Failed to insert database, Message={$exception->getMessage()}",0,$exception);
          }
        }

        public function update(){
          // not implemented.
        }

        public function delete(int $productId){
          try{
                $preparedStatement=$this->connection->prepare("DELETE FROM products WHERE product_id = ? ");
                $preparedStatement->bindValue(1,$productId,PDO::PARAM_INT);
                $preparedStatement->execute();
          }catch(Exception $exception){
            throw new Exception("Failed to insert database, Message={$exception->getMessage()}",0,$exception);
          }

        }
    }
?>