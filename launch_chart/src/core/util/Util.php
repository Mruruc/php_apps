<?php
declare(strict_types=1);
namespace MvcProject\Mruruc\core\util;

class Util{

    private function __construct(){}

    public static function extractTheUserNameFromEmail(string $email):string{
        return explode("@",$email)[0];
    }
}
?>