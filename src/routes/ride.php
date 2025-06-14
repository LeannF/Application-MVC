<?php
    $router->get('ride', 'RideController@getRides');
    $router->post('/ride', 'RideController@addRide');
    $router->post('ride/edit', 'RideController@editRide');
    $router->post('ride/delete', 'RideController@deleteRide')
?>