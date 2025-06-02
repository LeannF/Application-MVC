<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Buki\Router\Router;

    $router->use('/user', );
    $router->use('/agency', );
    $router->use('/ride', );

    $router->run();
?>