<?php

require_once __DIR__ . '/../vendor/autoload.php';

use insectdie\PHP\MVC\App\Router;
use insectdie\PHP\MVC\Config\Database;
use insectdie\PHP\MVC\Controller\ParkingController;
use insectdie\PHP\MVC\Controller\HomeController;
use insectdie\PHP\MVC\Controller\GajiController;

Database::getConnection('prod');

//Home Controller
Router::add('GET', '/', HomeController::class, 'index', []);

//Parking Controller
Router::add('GET', '/parking_rates', ParkingController::class, 'index', []);
Router::add('GET', '/parking_rates_add', ParkingController::class, 'viewAdd', []);
Router::add('POST', '/parking_rates/add', ParkingController::class, 'add', []);

//Gaji Controller
Router::add('GET', '/gaji', GajiController::class, 'index', []);
Router::add('GET', '/gaji_add', GajiController::class, 'viewAdd', []);
Router::add('POST', '/gaji/add', GajiController::class, 'add', []);

Router::run();