<?php

return [
    'support_dark_mode' => false,
    'dark_mode' => false,
    'resources' => [
        'favicon' => 'assets/media/logos/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Poppins:300,400,500,600,700'
                ]
            ]
        ],
        'css' => [
            'regular' => [
                'assets/plugins/global/plugins.bundle.css',
                'assets/css/style.bundle.css',
            ],
            'dark' => [
                'assets/plugins/global/plugins.dark.bundle.css',
                'assets/css/style.dark.bundle.css',
            ],
        ],
        'js' => [
            'assets/plugins/global/plugins.bundle.js',
            'assets/js/scripts.bundle.js',
        ],
        'logo' => [
            'light' => 'assets/media/logos/logo-1.svg',
            'dark' => 'assets/media/logos/logo-1-dark.svg',
        ],
        'auth' => [
            'background_color' => 'bg-body', // applied to body class: bg-body | bg-dark
            'background_image' => 'assets/media/illustrations/sketchy-1/14.png',
            'logo' => 'assets/media/logos/logo-1.svg',
        ]
    ],
    'menu' => [
        'aside_minimize' => 'off',
        'aside_background' => 'aside-dark',  // applied to aside class: aside-light | bg-dark
        'aside' => [
            [
                'title' => 'General'
            ],
            [
                'title' => 'Dashboard',
                'link' => 'dashboard',
                'icon' => 'fas fa-home fs-2'
            ],
            /*[
                'title' => 'Sub Menu',
                'icon' => 'bi bi-person fs-2',
                'sub_menu' => [
                    [
                        'title' => 'Item 1',
                        'link' => 'dashboard',
                    ]
                ]
            ],*/
        ],
        'header' => [
            [
                'title' => 'Dashboard',
                'link' => 'dashboard'
            ],
            /*[
                'title' => 'Sub Menu',
                'sub_menu' => [
                    [
                        'title' => 'Dashboard',
                        'link' => 'dashboard',
                    ]
                ]
            ]*/
        ],
        'footer' => [
            [
                'title' => 'Dashboard',
                'link' => '#'
            ]
        ]
    ],
    'routes' => [
        'prefix' => 'admin',
        'middleware' => 'web',
        'guard' => 'admin',
        'broker' => 'admins',
        'redirect_auth' => '/admin/dashboard',
        'redirect' => [
            'login' => 'dashboard'
        ]
    ],
    'developer' => [
        'show' => true,
        'name' => 'Novus Logics',
        'website' => 'https://novuslogics.com',
    ],
];
