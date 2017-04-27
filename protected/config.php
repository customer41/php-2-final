<?php

return [
    'title' => 'Блог Александра Попова',

    'db' => [
        'default' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'user' => 'root',
            'password' => '',
            'dbname' => 'php2final'
        ]
    ],

    'extensions' => [
        'jquery' => [],
        'bootstrap' => [
            'theme' => 'cosmo',
        ],
        'ckeditor' => [
            'location' => 'local',
        ],
    ]
];