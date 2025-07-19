<?php

require_once __DIR__ . '/../vendor/autoload.php';
define('APP_PATH', dirname(__DIR__) );

$app = new \App\Kernel\App();
$app->run();
