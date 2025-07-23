<?php

use App\Controllers\AdminController;
use App\Controllers\CategoriesController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\MovieController;
use App\Controllers\RegisterController;
use App\Kernel\Router\Route;

return[
    Route::get('/', function () {include_once APP_PATH . 'index.php';}),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movie', [MovieController::class, 'index']),
    Route::get('/login', [LoginController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::get('/admin', [AdminController::class, 'index']),
    Route::get('/categories', [CategoriesController::class, 'index']),
];