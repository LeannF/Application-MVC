<?php
    $router->get('user', 'UserController@getUsers');
    $router->post('/login', 'UserController@login');
    $router->get('/logout', 'UserController@logout');
?>