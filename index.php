<?php

require_once __DIR__ ."/vendor/autoload.php";

use App\Core\Router;

/**
 * DEV MODE
 */
header('Access-Control-Allow-Origin: *');


$router = new Router();

$router->add('GET', '/users/{id}', ['UserController', 'show']);
$router->add('POST', '/users/{id}/update', ['UserController', 'update']);
$router->add('GET', '/products/{category}/{id}', ['ProductController', 'view']);

//print_r($_SERVER);

class UserController
{
    public function show(string $id)
    {
        echo "Showing user with ID: $id";
    }

    public function update(string $id)
    {
        echo "Updating user with ID: $id";
    }
}

class ProductController
{
    public function view(string $category, string $id)
    {
        echo "Viewing product in category $category with ID: $id";
    }
}

$router->dispatch($_SERVER['REQUEST_URI']);