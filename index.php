<?php

require_once __DIR__ ."/vendor/autoload.php";

use App\Core\Router;
use App\Controller\ZipController;

/**
 * DEV MODE
 */
header('Access-Control-Allow-Origin: *');


$router = new Router();

$router->add('GET', '/zip/{zipcode}', [ZipController::class, 'show']);
$router->add('GET', '/zip/{uf}/{city}/{street}', [ZipController::class, 'showZipByLocation']);

$router->dispatch($_SERVER['REQUEST_URI']);