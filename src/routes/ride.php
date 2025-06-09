<?php
    $router->get('ride', 'RideController@getRides');
    $router->post('/ride', 'RideController@addRide');
    $router->put('ride/{id}', 'RideController@editRide');
    $router->delete('ride/{id}', 'RideController@deleteRide')
?>