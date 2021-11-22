<?php
include_once __DIR__ . '/libs/Route.php';
include_once __DIR__ . '/controller/controller.php';
include_once __DIR__ . '/controller/LoginController.php';
include_once __DIR__ . '/controller/HomeController.php';
include_once __DIR__ . '/controller/MovieController.php';

use src\controller\HomeController;
use src\controller\LoginController;
use src\controller\MovieController;
use Steampixel\Route;

$loginController = new LoginController();
$homeController = new HomeController();
$movieController = new MovieController();
// Add the first route
Route::add('/cadastro', fn () => $loginController->register(), ['get']);
Route::add('/login', fn () => $loginController->loginIndex(), ['get']);
Route::add('/login', fn () => $loginController->login(), ['post']);

Route::add('/home', fn () => $homeController->homeIndex(), ['get']);
Route::add('/addMovie', fn () => $movieController->addMovieIndex(), ['get']);

Route::add('/cadastro', fn () => $loginController->cadastro(), ['post']);

Route::add('/logout', fn () => $loginController->sair(), ['post']);

/* Route::add('/pages/home/index.html', function ($id) {
}, 'get'); */

// Run the router
Route::run('/');
