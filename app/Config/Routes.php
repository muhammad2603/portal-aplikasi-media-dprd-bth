<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// jika user masuk ke root publik (http://domain.com/), arahkan ke rute login
$routes->get('/', fn() => redirect()->to('/login')->setStatusCode(301));
// @GET login
$routes->get('/login', 'Login::index');
// @GET register
$routes->get('/daftar', 'Registrasi::index');
