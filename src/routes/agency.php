<?php
    $router->get('agency', 'AgencyController@getAgencies');
    $router->post('agency', 'AgencyController@addRide');
    $router->post('agency/{id}', 'AgencyController@editRide');
    $router->post('agency/{id}', 'AgencyController@deleteRide')
?>