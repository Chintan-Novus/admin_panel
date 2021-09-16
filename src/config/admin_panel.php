<?php

return [
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
    ],
    'menu' => [
        'aside' => [
            [
                'title' => 'Section 1'
            ],
            [
                'title' => 'Menu 1',
                'link' => '#',
                'icon' => 'bi bi-person fs-2'
            ],
            [
                'title' => 'Menu 2',
                'link' => '#',
                'icon' => 'bi bi-person fs-2'
            ],
            [
                'title' => 'Section 2'
            ],
            [
                'title' => 'Menu 3',
                'link' => '#',
                'icon' => 'bi bi-person fs-2'
            ],
            [
                'title' => 'Section 3'
            ],
            [
                'title' => 'Sub Menu',
                'icon' => 'bi bi-person fs-2',
                'sub_menu' => [
                    [
                        'title' => 'Item 1',
                        'link' => '#',
                    ],
                    [
                        'title' => 'Item 2',
                        'link' => '#'
                    ],
                    [
                        'title' => 'Item 3',
                        'link' => '#'
                    ]
                ]
            ],
        ],
        'header' => [
            [
                'title' => 'Menu 1',
                'link' => '#'
            ],
            [
                'title' => 'Menu 2',
                'link' => '#'
            ],
            [
                'title' => 'Menu 3',
                'sub_menu' => [
                    [
                        'title' => 'Item 1',
                        'link' => '#',
                    ],
                    [
                        'title' => 'Item 2',
                        'link' => '#',
                    ]
                ]
            ]
        ],
        'footer' => [
            [
                'title' => 'Menu 1',
                'link' => '#'
            ],
            [
                'title' => 'Menu 2',
                'link' => '#'
            ],
        ]
    ]
];
