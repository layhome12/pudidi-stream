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

#======== START ROUTE ========#

$routes->get('/', 'Landing::index');
$routes->add('logout', 'Login::logout');

#======== ADMINISTRATOR ROUTE ========#

$routes->group('administrator', ['filter' => 'adminfilt'], function ($routes) {

    $routes->add('/', 'Administrator::index');
    $routes->add('dashboard_fetch', 'Administrator::index');
    //Videos
    $routes->add('video', 'Administrator::video');
    $routes->add('video_fetch', 'Administrator::video_fetch');
    $routes->add('video_form', 'Administrator::video_form');
    $routes->add('video_save', 'Administrator::video_save');
    $routes->add('video_del', 'Administrator::video_del');
    //Users
    $routes->add('users_management', 'Administrator::users_management');
    $routes->add('users_management_fetch', 'Administrator::users_management_fetch');
    $routes->add('users_management_form', 'Administrator::users_management_form');
    $routes->add('users_management_block', 'Administrator::users_management_block');
    //Admin
    $routes->add('admin_management', 'Administrator::admin_management');
    $routes->add('admin_management_fetch', 'Administrator::admin_management_fetch');
    $routes->add('admin_management_form', 'Administrator::admin_management_form');
    $routes->add('admin_management_save', 'Administrator::admin_management_save');
    $routes->add('admin_management_del', 'Administrator::admin_management_del');
});

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
