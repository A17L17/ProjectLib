<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);b

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::home');

$routes->post('/auth', 'Auth::login');
$routes->get('/logout', 'Auth::logout');


$routes->get('/staff', 'Staff::index');
$routes->get('/staff-add', 'Staff::add');
$routes->post('/staff-addpro', 'Staff::addpro');
$routes->get('/staff-edit/(:num)', 'Staff::edit/$1');
$routes->get('/staff-edit', 'Staff::edit');
$routes->post('/staff-editpro', 'Staff::editpro');
$routes->get('/staff-del/(:num)', 'Staff::del/$1');


$routes->get('/publisher', 'Publisher::index');
$routes->get('/publisher-add', 'Publisher::add');
$routes->post('/publisher-addpro', 'Publisher::addpro');
$routes->get('/publisher-edit/(:num)', 'Publisher::edit/$1');
$routes->get('/publisher-edit', 'Publisher::edit');
$routes->post('/publisher-editpro', 'Publisher::editpro');
$routes->get('/publisher-del/(:num)', 'Publisher::del/$1');


$routes->get('/category', 'Category::index');
$routes->get('/category-add', 'Category::add');
$routes->post('/category-addpro', 'Category::addpro');
$routes->get('/category-edit/(:num)', 'Category::edit/$1');
$routes->get('/category-edit', 'Category::edit');
$routes->post('/category-editpro', 'Category::editpro');
$routes->get('/category-del/(:num)', 'Category::del/$1');


$routes->get('/borrower', 'Borrower::index');
$routes->get('/borrower-add', 'Borrower::add');
$routes->post('/borrower-addpro', 'Borrower::addpro');
$routes->get('/borrower-edit/(:num)', 'Borrower::edit/$1');
$routes->get('/borrower-edit', 'Borrower::edit');
$routes->post('/borrower-editpro', 'Borrower::editpro');
$routes->get('/borrower-del/(:num)', 'Borrower::del/$1');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
