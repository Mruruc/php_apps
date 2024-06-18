<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\service;

use MvcProject\Mruruc\dao\UserDao;
use MvcProject\Mruruc\exceptions\LoginExceptions;
use MvcProject\Mruruc\model\User;

class LoginService{
    private UserDao $userDao;

    public function __construct(){
        $this->userDao=new UserDao();
    }



    public function login(User $user):User {
        try {
            $dbUser = $this->userDao->getUserByUserName($user->getUserName());

            if (password_verify($user->getPassword() , $dbUser->getPassword())) {
                return $dbUser;
            }
    
            throw new LoginExceptions("Incorrect Password!");
        
        } catch (LoginExceptions $ex) {
            throw $ex;
        } 
    }

    public function extractTheUserNameFromEmail(string $email):string{
        return explode("@",$email)[0];
    }

}
?>