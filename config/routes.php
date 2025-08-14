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
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/register', [RegisterController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/register', [RegisterController::class, 'register'], [GuestMiddleware::class]),
    Route::get('/login', [LoginController::class, 'index'], [GuestMiddleware::class]),
    Route::post('/login', [LoginController::class, 'login'], [GuestMiddleware::class]),
    Route::post('/logout', [LoginController::class, 'logout'], [AuthMiddleware::class]),
    Route::get('/admin', [AdminController::class, 'index'], [AuthMiddleware::class]),
    Route::get('/admin/categories/add', [CategoriesController::class, 'create'], [AuthMiddleware::class]),
    Route::post('/admin/categories/add', [CategoriesController::class, 'add'], [AuthMiddleware::class]),
    Route::post('/admin/categories/delete', [CategoriesController::class, 'delete'], [AuthMiddleware::class]),
    Route::post('/admin/categories/update', [CategoriesController::class, 'update'], [AuthMiddleware::class]),
    Route::get('/admin/categories/update', [CategoriesController::class, 'edit'], [AuthMiddleware::class]),
    Route::get('/movie', [MovieController::class, 'index']),
    Route::get('/admin/movies/add', [MovieController::class, 'add'], [AuthMiddleware::class]),
    Route::post('/admin/movies/add', [MovieController::class, 'postAdd'], [AuthMiddleware::class]),
    Route::post('/admin/movies/delete', [MovieController::class, 'delete'], [AuthMiddleware::class]),


    Route::get('/categories', [CategoriesController::class, 'index']),
];