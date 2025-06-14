<?php
    session_start();
    ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errorLog.log'); // Log in your project folder
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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
    require_once __DIR__ . '/../src/routes/home.php';
    require_once __DIR__ . '/../src/routes/user.php';
    require_once __DIR__ . '/../src/routes/agency.php';
    require_once __DIR__ . '/../src/routes/ride.php';

    $router->run();
?>