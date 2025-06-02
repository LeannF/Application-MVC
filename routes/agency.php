<?php
    $router->get('agency', 'AgencyController@getAgencies');
    $router->post('agency', 'AgencyController@addRide');
    $router->put('agency/{id}', 'AgencyController@editRide');
    $router->delete('agency/{id}', 'AgencyController@deleteRide')
?>