<?php
    $router->get('agency', 'AgencyController@getAgencies');
    $router->post('/agency', 'AgencyController@addRide');
    $router->post('agency/edit', 'AgencyController@editRide');
    $router->post('agency/delete', 'AgencyController@deleteRide')
?>