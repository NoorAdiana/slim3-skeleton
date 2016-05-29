<?php

return [
    'settings' => [
        'displayErrorDetails' => getenv('APP_ENV') === 'development' ? true : false,
        'view' => [
            'template_path' => __DIR__ . '/resources/views',
            'twig' => [
                'cache' => __DIR__ . '/cache',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        'db' => [
            'driver' => getenv('DB_DRIVER'),
            'host' => getenv('DB_HOST'),
            'database' => getenv('DB_NAME'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => getenv('DB_CHARSET') ?: 'utf8',
            'collaction' => getenv('DB_COLLACTION') ?: 'utf8_unicode_ci',
            'prefix' => getenv('DB_PREFIX') ?: '',
        ],
    ],
];