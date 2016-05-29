<?php

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Illuminate Eloquent Capsule
// -----------------------------------------------------------------------------
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->settings['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// -----------------------------------------------------------------------------
// Flash Message
// -----------------------------------------------------------------------------
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

// -----------------------------------------------------------------------------
// Twig
// -----------------------------------------------------------------------------
$container['view'] = function ($container){
    $settings = $container->settings;
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
    $view->addExtension(new Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    $view->addExtension(new Twig_Extension_Debug());

    $view->getEnvironment()->addGlobal('flash', $container->flash);

    return $view;
};

// -----------------------------------------------------------------------------
// Database
// -----------------------------------------------------------------------------
$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

// -----------------------------------------------------------------------------
// Slim CSRF
// -----------------------------------------------------------------------------
$container['csrf'] = function ($container) {
    return new Slim\Csrf\Guard;
};

// -----------------------------------------------------------------------------
// Controller
// -----------------------------------------------------------------------------
$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};
