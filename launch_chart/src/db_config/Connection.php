<?php

declare(strict_types=1);

namespace MvcProject\Mruruc\db_config;


use Dotenv\Dotenv;
use PDO;
use PDOException;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Connection{
    private  static ?PDO $con=null;

    private function __construct(){}

    public static function getConnection():PDO{
       try{
            if(Connection::$con === null){
                Connection::$con=new PDO(
                    "pgsql:host=".$_ENV["DB_HOST"].";port=".$_ENV["DB_PORT"].";dbname=".$_ENV["DB_NAME"],
                    $_ENV["DB_USERNAME"],
                    $_ENV["DB_PASSWORD"]
                   );
            }
            return Connection::$con;
       }
       catch(PDOException $ex){
         throw new PDOException($ex->getMessage(),$ex->getCode());
       }
    }
}




?>