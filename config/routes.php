<?php

use App\Controllers\HomeController;
use App\Controllers\MovieController;
use App\Kernel\Router\Route;

return[
    Route::get('/', function () {
        include_once APP_PATH . 'index.php';
    }),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movie', [MovieController::class, 'index']),
];