<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Guest-only routes (redirect to dashboard if logged in)
$routes->get('/', 'Auth::login', ['filter' => 'guest']);
$routes->get('login', 'Auth::login', ['filter' => 'guest']);
$routes->post('login', 'Auth::attemptLogin', ['filter' => 'guest']);
$routes->get('register', 'Auth::register', ['filter' => 'guest']);
$routes->post('register', 'Auth::attemptRegister', ['filter' => 'guest']);

// Logout works for anyone
$routes->get('logout', 'Auth::logout');

// Protected routes (require login)
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

// Records CRUD - protected
$routes->get('records', 'Records::index', ['filter' => 'auth']);
$routes->get('records/create', 'Records::create', ['filter' => 'auth']);
$routes->post('records/store', 'Records::store', ['filter' => 'auth']);
$routes->get('records/show/(:num)', 'Records::show/$1', ['filter' => 'auth']);
$routes->get('records/edit/(:num)', 'Records::edit/$1', ['filter' => 'auth']);
$routes->post('records/update/(:num)', 'Records::update/$1', ['filter' => 'auth']);
$routes->get('records/delete/(:num)', 'Records::delete/$1', ['filter' => 'auth']);