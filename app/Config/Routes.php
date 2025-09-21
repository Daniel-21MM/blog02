<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/home', 'Home::index', ['filter' => 'session']);

// Auth
$routes->get('/', 'AuthController::index');
$routes->post('/store', 'AuthController::store');
$routes->get('/insertUser', 'AuthController::insertUser');

// Blog
$routes->get('/create', 'BlogController::index', ['filter' => 'session']);
$routes->post('/create', 'BlogController::store',  ['filter' => 'session']);
$routes->get('/edit/(:num)', 'BlogController::edit/$1', ['filter' => 'session']);
$routes->post('/update', 'BlogController::update', ['filter' => 'session']);
$routes->get('/delete/(:num)', 'BlogController::delete/$1', ['filter' => 'session']);
