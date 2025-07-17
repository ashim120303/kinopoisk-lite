<?php

use App\Router\Route;
return[
    Route::get('/', function () {
        include_once APP_PATH . '/index.php';
    }),
    Route::get('/home', function () {
        include_once APP_PATH . "/templates/home.php";
    }),
    Route::get('/admin', function () {
        include_once APP_PATH . "/templates/admin.php";
    })
];