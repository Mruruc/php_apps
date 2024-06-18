<?php 
namespace PhpPdo\Mruruc\config;
use Dotenv\Dotenv;
use PDO;
use Exception;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class ConfigDb{
    private static ?PDO $con=null;

    private function __construct(){}

    public static function getConnection(){
        try{
          
            if(ConfigDb::$con == null){
                ConfigDb::$con=new PDO(
                    "mysql:host=".$_ENV["DB_HOST"].";port=".$_ENV["DB_PORT"].";dbname=".$_ENV["DB_NAME"].";sslmode=verify-ca;sslrootcert=ca.pem",
                    $_ENV["DB_USER"],
                    $_ENV["DB_PASSWORD"] );
            }

            return ConfigDb::$con;
        }
        catch(Exception $ex){
            throw new Exception("Failed to connect database!. Message={$ex->getMessage()}");
        }
    }
}
?>

