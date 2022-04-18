<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::Login');
$routes->get('/Dashboard', 'Home::index');
$routes->get('/Registration/validation', 'Registration::validation');

$routes->get('/Passanger/wna', 'WnaController::index');
$routes->delete('/Passanger/wna/delete/(:num)', 'WnaController::deleteData/$1');
$routes->post('/Passanger/wna/detail/(:any)', 'WnaController::getDetail/$1');
$routes->post('/Passanger/wna/update/(:any)', 'WnaController::getUpdate/$1');

$routes->get('/Passanger/wni', 'WniController::index');
$routes->delete('/Passanger/wni/delete/(:num)', 'WniController::deleteData/$1');
$routes->post('/Passanger/wni/detail/(:any)', 'WniController::getDetail/$1');
$routes->post('/Passanger/wni/update/(:any)', 'WniController::getUpdate/$1');

$routes->get('/Airlines', 'AirlineController::index');
$routes->get('/Airlines/Add', 'AirlineController::Add');
$routes->delete('/Airlines/delete/(:num)', 'AirlineController::Delete/$1');
$routes->post('/Airlines/update/(:any)', 'AirlineController::getUpdate/$1');

$routes->get('/Report', 'ReportController::index');
$routes->post('/Report/getData/(:any)', 'ReportController::getData');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
