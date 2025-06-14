<?php
    $router->get('agency', 'AgencyController@getAgencies');
    $router->post('/agency', 'AgencyController@addAgency');
    $router->post('agency/edit', 'AgencyController@editAgency');
    $router->post('agency/delete', 'AgencyController@deleteAgency')
?>