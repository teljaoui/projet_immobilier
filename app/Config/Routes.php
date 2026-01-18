<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['namespace' => 'App\Controllers\Public'], function ($routes) {
    $routes->get('/', 'HomeController::index');
    $routes->get('apropos', 'AboutController::index');
    $routes->get('contact', 'ContactController::index');
    $routes->get('biens', 'PropertyController::index');
    $routes->get('catalogue', 'PropertyController::index_cart');
    $routes->get('bien/(:segment)', 'PropertyController::show/$1');
    $routes->get('/favorites', 'FavoritesController::index');

    $routes->get('connexion', 'LoginController::login');
    $routes->get('inscription', 'LoginController::register');

    $routes->post('inscription_post', 'LoginController::register_post');
    $routes->post('login', 'LoginController::login_post');
    $routes->post('logout', 'LoginController::logout', ['filter' => 'auth']);
});


$routes->group('client', ['filter' => 'auth', 'namespace' => 'App\Controllers\Client'], function ($routes) {
    $routes->get('/', 'ClientController::index');
});

$routes->group('admin', ['filter' => 'auth','namespace' => 'App\Controllers\Admin'], function ($routes) {

    $routes->get('/', 'DashboardController::index');

    $routes->group('biens', function ($routes) {
        $routes->get('/', 'PropertyController::index');     
        $routes->get('create', 'PropertyController::create'); 
        $routes->post('store', 'PropertyController::store'); 
        $routes->get('edit/(:num)', 'PropertyController::edit/$1');
        $routes->post('update/(:num)', 'PropertyController::update/$1');
        $routes->get('delete/(:num)', 'PropertyController::delete/$1');
    });

    $routes->group('messages', function ($routes) {
        $routes->get('/', 'MessageController::index');        
        $routes->get('show/(:num)', 'MessageController::show/$1');
        $routes->post('delete/(:num)', 'MessageController::delete/$1');
    });

    $routes->group('utilisateurs', function ($routes) {
        $routes->get('/', 'UserController::index');
        $routes->get('create', 'UserController::create');
        $routes->post('store', 'UserController::store');
        $routes->get('edit/(:num)', 'UserController::edit/$1');
        $routes->post('update/(:num)', 'UserController::update/$1');
        $routes->post('delete/(:num)', 'UserController::delete/$1');
    });

});
