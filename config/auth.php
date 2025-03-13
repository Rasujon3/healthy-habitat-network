<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        // Add this section for the 'resident' guard
        'resident' => [
            'driver' => 'session',
            'provider' => 'residents',
        ],

        // Example of another guard like business
        'business' => [
            'driver' => 'session',
            'provider' => 'businesses',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Add this section for the 'residents' provider
        'residents' => [
            'driver' => 'eloquent',
            'model' => App\Models\Resident::class,
        ],

        'businesses' => [
            'driver' => 'eloquent',
            'model' => App\Models\Business::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'residents' => [
            'provider' => 'residents',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'businesses' => [
            'provider' => 'businesses',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800,
];
