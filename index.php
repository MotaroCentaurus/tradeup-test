<?php

require_once __DIR__ ."/vendor/autoload.php";

use Dsousa\PhpViacepTest\Router;

/**
 * DEV MODE
 */
header('Access-Control-Allow-Origin: *');


$router = new Router();

print_r($_SERVER);