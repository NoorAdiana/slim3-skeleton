<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();
$dotenv->required(['APP_ENV', 'DB_DRIVER', 'DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASSWORD']);

$settigs = require __DIR__ . '/settings.php';
$app = new Slim\App($settigs);

// Set up dependencies  
require __DIR__ . '/dependencies.php';

// Set up middleware  
require __DIR__ . '/middleware.php';

// Set up router
require __DIR__ . '/routes.php';