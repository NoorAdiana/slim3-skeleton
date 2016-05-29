<?php
// Get data input from user
$app->add(new App\Middleware\InputMiddleware($container));

// CSRF View
$app->add(new App\Middleware\CsrfViewMiddleware($container));

// Slim CSRF
$app->add($container->csrf);