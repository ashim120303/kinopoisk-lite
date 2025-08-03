<?php

use App\Controllers\AdminController;
use App\Controllers\CategoriesController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Kernel\Router\Route;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

return[
    Route::get('/', function () {include_once APP_PATH . 'index.php';}),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movie', [MovieController::class, 'index']),
    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),
    Route::get('/register', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::get('/admin', [AdminController::class, 'index']),
    Route::get('/categories', [CategoriesController::class, 'index']),
    Route::get('/testReg', [RegisterController::class, 'test'], [GuestMiddleware::class]),


    Route::post('/testReg', [RegisterController::class, 'register'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login'], [GuestMiddleware::class]),
    Route::post('/logout', [LoginController::class, 'logout']),

    Route::get('/admin/movies/add', [MovieController::class, 'add'], [AuthMiddleware::class]),
    Route::post('/admin/movies/add', [MovieController::class, 'postAdd']),
];