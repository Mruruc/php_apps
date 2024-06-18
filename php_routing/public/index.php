<?php

    require_once '../src/Router/Router.php';

    use Mruruc\Router\Router;


    $page = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'home';

    Router::route($page);

?>