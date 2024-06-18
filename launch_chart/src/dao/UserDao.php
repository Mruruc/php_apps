<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\dao;

use MvcProject\Mruruc\db_config\Connection;
use MvcProject\Mruruc\model\User;
use PDO;
use MvcProject\Mruruc\exceptions\LoginExceptions;
use MvcProject\Mruruc\exceptions\UserExistsException;
use MvcProject\Mruruc\exceptions\UserNotFoundException;
use MvcProject\Mruruc\repository\CrudRepository;
use PDOException;
use RuntimeException;

class UserDao implements CrudRepository{

  public function __construct(){}

                   
    public function findAll():array{
      try{
        $sql="SELECT * FROM users";
        $con=Connection::getConnection();

        $prepareStatement=$con->prepare($sql);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'MvcProject\Mruruc\model\User');

        return $prepareStatement->fetchAll();

      }catch(PDOException $ex){
        throw new DaoException("Internal Server Error! \n ".$ex->getMessage());
      }
    }

    public function save(object $user):object{
        try{

            $sql="INSERT INTO users(user_name,password) VALUES(?,?) RETURNING * ";

            $con=Connection::getConnection();
            $prepareStatement=$con->prepare($sql);

            $prepareStatement->bindValue(1,$user->getUserName());
            $prepareStatement->bindValue(2,$user->getPassword());

            $prepareStatement->execute();

            $prepareStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'MvcProject\Mruruc\model\User');
            return  $prepareStatement->fetch();

       }catch(PDOException $ex){
          if($ex->getCode() == 23505 ){
             throw new UserExistsException("User Already Exists!");
          }
          throw new DaoException("Internal Server Error!");
       }
    }


    public function delete(int $entityId):User{
       try{
        $sql="DELETE FROM users WHERE user_id = ? RETURNING * ";

        $con=Connection::getConnection();

        $prepareStatement=$con->prepare($sql);
        $prepareStatement->bindValue(1,$entityId);
        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'MvcProject\Mruruc\model\User');
        return $prepareStatement->fetch();

       }catch(PDOException $ex){
         throw new DaoException("Dao Exception!".$ex->getMessage());
       }
    }


    public function findById(int $userId):User{
      try{
        $sql="SELECT * FROM users WHERE user_id = ? ";
        $con=Connection::getConnection();

        $prepareStatement=$con->prepare($sql);
        $prepareStatement->bindValue(1,$userId);

        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'MvcProject\Mruruc\model\User');

        $user=$prepareStatement->fetch();
    
        if(!$user){
          throw new UserNotFoundException("User Not Found! with id: $userId");
        }
        return $user;
      }catch(PDOException  $ex){
        throw new DaoException("Internal Server Error!".$ex->getMessage());
      }
    }


    public function getUserByUserName(string $userName){
      try{
        $sql="SELECT * FROM users WHERE user_name LIKE ? ";
        $con=Connection::getConnection();

        $prepareStatement=$con->prepare($sql);
        $prepareStatement->bindValue(1,$userName);

        $prepareStatement->execute();
        $prepareStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'MvcProject\Mruruc\model\User');

        $user=$prepareStatement->fetch();
        if(!$user){
          throw new LoginExceptions("Incorrect User Name!");
        }
        return $user;
      }catch(PDOException  $ex){
        throw new RuntimeException("Internal Server Error!");
      }

    }



    public function update(int $userId,$newUser):User{
      try{      

        $sql="UPDATE users SET user_name=?,password=? WHERE user_id = ? RETURNING * ";

        $con=Connection::getConnection();
        $prepareStatement=$con->prepare($sql);

        $prepareStatement->bindValue(1,$newUser->getUserName());	
        $prepareStatement->bindValue(2,$newUser->getPassword());
        $prepareStatement->bindValue(3,$userId);

        $prepareStatement->execute();

        $prepareStatement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'MvcProject\Mruruc\model\User');
        return $prepareStatement->fetch();

      }catch(PDOException $ex){
        throw new DaoException("Internal Server Error!");
      }
    }

}
?>