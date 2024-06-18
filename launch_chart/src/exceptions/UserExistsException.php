<?php
declare(strict_types=1);	
namespace MvcProject\Mruruc\exceptions;

class UserExistsException extends \RuntimeException{
  public function __construct(string $message){
    parent::__construct($message);
  }
}

?>