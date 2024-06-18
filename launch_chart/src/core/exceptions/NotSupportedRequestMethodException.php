<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\exceptions;

use RuntimeException;

class NotSupportedRequestMethodException extends RuntimeException{
    public function __construct($message){
        parent::__construct($message);
    }
}

?>