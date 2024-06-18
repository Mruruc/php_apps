<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\auth;

class UserAuth{
    public static function startSession(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime' => 0, 
                'path' => '/', 
                'domain' => '', 
                'secure' => true, 
                'httponly' => true, 
                'samesite' => 'Lax']);
            session_start();
        }
    }

    public static function isUserLoggedIn(): bool {
        self::startSession();
        return isset($_SESSION['userId']) && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    public static function logout(): void {
        self::startSession();
        session_unset(); 
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/'); 
    }
}

?>