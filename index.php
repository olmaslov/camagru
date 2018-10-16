<?php

session_start();

require 'application/lib/Dev.php';
require 'application/lib/Functions.php';

spl_autoload_register(function ($class){
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

$router = new \application\core\Router();
$router->run();