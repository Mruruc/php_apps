<?php 

declare(strict_types=1);
namespace MvcProject\Mruruc\model;

class User implements \JsonSerializable{
 
   private int $user_id;
   private string $user_name;
   private string $password;

   public function __construct(int $user_id=0,string $user_name='',string $password=''){
      $this->user_id=$user_id;
      $this->user_name=$user_name;
      $this->password=$password;
   }

   public function getUserId():int{
      return $this->user_id;
   }

   public function setId($newId): void{
      $this->user_id=$newId;
   }

   public function getUserName():string{
      return $this->user_name;
   }
   public function getPassword():string{
      return $this->password;
   }

   public function setUserName($newUserName): void{
      $this->user_name=$newUserName;
   }

   public function setPassword($newPassword): void{
      $this->password=$newPassword;
   }

   public function jsonSerialize():mixed {
      return [
         'id' => $this->user_id,
         'user_name' => $this->user_name,
         'password' => $this->password
      ];
   }

   public function __toString():string{
      return "User={ \n
         id=$this->user_id,\n
         userName=$this->user_name,\n
         password=$this->password \n
      }";
   }

}
?>