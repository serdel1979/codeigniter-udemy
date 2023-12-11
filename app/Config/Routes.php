<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('uploadpost', 'Dashboard::uploadpost');
$routes->post('uploadpost', 'Dashboard::uploadpost');



