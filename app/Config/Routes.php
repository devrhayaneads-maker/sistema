<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/rhayane', 'Home::rhayane');

$routes->get('/quem-sou', 'ConteudoController::quemSou');
$routes->get('/produtos', 'ConteudoController::produtos');
$routes->get('/contato', 'ConteudoController::contato');