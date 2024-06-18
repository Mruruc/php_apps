<?php

declare(strict_types=1);

namespace MvcProject\Mruruc\service;

use MvcProject\Mruruc\model\User;
use Exception;
use InvalidArgumentException;
use MvcProject\Mruruc\dao\UserDao;

class UserService
{

    private UserDao  $userDao;

    public function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function getAllUsers(): array{

        return $this->userDao->findAll();
    }

    public function getUserById(int $userId): object{
        return $this->userDao->findById($userId);
    }


    public function saveUser($user): object
    {
        if (!$user instanceof User) {
            throw new InvalidArgumentException('Expected a User Instance!');
        }
        // hash the password
        $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
        return $this->userDao->save($user);
        
    }


    public function delete(int $userId): object
    {
        $user = $this->getUserById($userId);
        try {
            return $this->userDao->delete($user->getUserId());
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function update(int $userId, $newUser): object
    {
        try {
            $user = $this->getUserById($userId);
            if ($newUser->getUserName()) {
                $user->setUserName($newUser->getUserName());
            }
            if ($newUser->getPassword()) {
                $user->setPassword(password_hash($newUser->getPassword(), PASSWORD_DEFAULT));
            }
            return $this->userDao->update($userId, $user);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
