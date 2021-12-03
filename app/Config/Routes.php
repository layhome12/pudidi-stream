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

#======== LANDING ROUTE ========#

//Search
$routes->add('pencarian', 'Landing::pencarian');
//Watch
$routes->add('movies', 'Movies::index');
//Order Filter
$routes->add('kategori/(:any)', 'Kategori::index/$1');
$routes->add('list/(:any)', 'ListMovies::index/$1');
//Our Info
$routes->add('tentang', 'OurInfo::tentang');
$routes->add('kontak', 'OurInfo::kontak');
$routes->add('kebijakan_privasi', 'OurInfo::kebijakan_privasi');
$routes->add('donasi', 'OurInfo::donasi');
//Movies
$routes->add('movies/(:any)', 'Movies::index/$1');
$routes->add('movies_comment', 'Movies::get_comments');
$routes->add('comment_save', 'Movies::comments_save');
//Users
$routes->add('users/(:any)', 'Users::index/$1', ['filter' => 'userfilt']);
$routes->add('users_profile', 'Users::profile', ['filter' => 'userfilt']);
$routes->add('users_favorit', 'Users::favorit', ['filter' => 'userfilt']);
$routes->add('users_setting', 'Users::setting', ['filter' => 'userfilt']);
$routes->add('users_setting_save', 'Users::setting_save', ['filter' => 'userfilt']);

#======== ADMINISTRATOR ROUTE ========#

$routes->group('administrator', ['filter' => 'adminfilt'], function ($routes) {

    $routes->add('/', 'Administrator::index');
    $routes->add('dashboard_fetch', 'Administrator::index');
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
    //Kategori Videos
    $routes->add('kategori_video', 'Administrator::kategori_video');
    $routes->add('kategori_video_fetch', 'Administrator::kategori_video_fetch');
    $routes->add('kategori_video_form', 'Administrator::kategori_video_form');
    $routes->add('kategori_video_save', 'Administrator::kategori_video_save');
    $routes->add('kategori_video_del', 'Administrator::kategori_video_del');
    //Videos
    $routes->add('video/(:any)', 'Administrator::video/$1');
    $routes->add('video_fetch', 'Administrator::video_fetch');
    $routes->add('video_form', 'Administrator::video_form');
    $routes->add('video_save', 'Administrator::video_save');
    $routes->add('video_del', 'Administrator::video_del');
    //Slide Videos
    $routes->add('video_slide', 'Administrator::video_slide');
    $routes->add('video_slide_fetch', 'Administrator::video_slide_fetch');
    $routes->add('video_slide_form', 'Administrator::video_slide_form');
    $routes->add('video_slide_save', 'Administrator::video_slide_save');
    $routes->add('video_slide_del', 'Administrator::video_slide_del');
    //Artikel Videos
    $routes->add('video_artikel', 'Administrator::video_artikel');
    $routes->add('video_artikel_fetch', 'Administrator::video_artikel_fetch');
    $routes->add('video_artikel_form', 'Administrator::video_artikel_form');
    $routes->add('video_artikel_save', 'Administrator::video_artikel_save');
    $routes->add('video_artikel_del', 'Administrator::video_artikel_del');
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
