<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('artikel', 'ArticleUser::index');
$routes->get('artikel/(:segment)', 'ArticleUser::detail/$1');



$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register-admin', 'Auth::registerAdmin');
$routes->post('/register-admin', 'Auth::processRegisterAdmin');


$routes->group('admin', ['filter' => 'auth', 'namespace' => 'App\Controllers'], function($routes) {
    // Dashboard
    $routes->get('dashboard', 'AdminController::dashboard');

    // CRUD Kategori 
    $routes->get('category', 'CategoryController::index');
    $routes->get('//create', 'CategoryController::create');
    $routes->post('category/store', 'CategoryController::store');
    $routes->get('category/edit/(:num)', 'CategoryController::edit/$1');
    $routes->post('category/update/(:num)', 'CategoryController::update/$1');
    $routes->get('category/delete/(:num)', 'CategoryController::delete/$1');

    // CRUD Artikel 
    // Artikel CRUD + Import PDF (satu view dengan modal)
    $routes->get('article', 'ArticleController::index');
    $routes->post('article/store', 'ArticleController::store');
    $routes->get('article/delete/(:num)', 'ArticleController::delete/$1');
    $routes->get('article/upload-pdf', 'ArticleController::createFromPdf');
    $routes->post('article/storeFromPdf', 'ArticleController::storeFromPdf');


     // Artikel → Import dari PDF
    $routes->get ('admin/article/upload-pdf', 'ArticleController::createFromPdf');
    $routes->post('admin/article/storeFromPdf', 'ArticleController::storeFromPdf');

});

// Chatbot admin
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    // CRUD Chatbot Admin
    $routes->get('chatbot', 'ChatbotAdmin::index');
    $routes->get('chatbot/create', 'ChatbotAdmin::create');
    $routes->post('chatbot/store', 'ChatbotAdmin::store');
    $routes->get('chatbot/edit/(:num)', 'ChatbotAdmin::edit/$1');
    $routes->post('chatbot/update/(:num)', 'ChatbotAdmin::update/$1');
    $routes->get('chatbot/delete/(:num)', 'ChatbotAdmin::delete/$1');
});






// Chatbot User
$routes->get('/chatbot', 'ChatbotUser::index');
$routes->post('chatbot/ask', 'ChatbotUser::ask');

$routes->get('pengumuman/(:segment)', 'Pengumuman::detail/$1');
$routes->get('agenda/(:segment)', 'Agenda::detail/$1');


$routes->resource('category', ['controller' => 'Category', 'except' => 'show']);
$routes->resource('article',  ['controller' => 'Article',  'except' => 'show']);

