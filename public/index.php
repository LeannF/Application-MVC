<?php

    ini_set('display errors', 1);
    error_reporting(E_ALL);


    /** loading composer's autoloader */
    require_once __DIR__ . '/../vendor/autoload.php';

    use Buki\Router\Router;

    /** router init with paths and namespaces */
    $router = new Router([
        'paths' => [
            'controllers'=> '../src/controllers',
        ],
        'namespaces' => [
            'controllers' => 'App\Controllers',
        ],
    ]);

    /** add routes */
    require_once __DIR__ . '/../src/routes/user.php';
    require_once __DIR__ . '/../src/routes/agency.php';
    require_once __DIR__ . '/../src/routes/ride.php';

    $router->run();
?>