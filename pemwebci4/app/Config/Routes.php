<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\PostsController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PostsController::index', ['as' => 'app.index']);
$routes->post('/', 'PostsController::store', ['as' => 'app.store']);
