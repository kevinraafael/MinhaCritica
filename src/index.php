<?php
include_once __DIR__ . '/libs/Route.php';
include_once __DIR__ . '/controller/controller.php';
include_once __DIR__ . '/controller/Login.php';
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
Route::add('/cadastro', fn () => $loginController->registerIndex(), ['get']);
Route::add('/login', fn () => $loginController->loginIndex(), ['get']);

Route::add('/home', fn () => $homeController->homeIndex(), ['get']);
Route::add('/addMovie', fn () => $movieController->addMovieIndex(), ['get']);

Route::add('/cadastro', fn () => $loginController->register(), ['POST']);


Route::run('/');
