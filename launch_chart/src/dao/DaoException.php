<?php
declare(strict_types=1);

namespace MvcProject\Mruruc\dao;

class DaoException extends \RuntimeException{
    public function __construct(string $message){
        parent::__construct($message);
    }
}


?>