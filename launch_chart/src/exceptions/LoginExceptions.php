<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\exceptions;

use RuntimeException;

class LoginExceptions extends RuntimeException{
    public function __construct($message){
        parent::__construct($message);
    }
}
?>