<?php

// mysql数据库

return [
    'master'    => [
        0 => [
            'database_type' => 'mysql',
            'database_name' => 'psr_test',
            'server'        => '127.0.0.1',
            'username'      => 'root',
            'password'      => '',
            'charset'       => 'utf8'
        ],

        1 => [
            'database_type' => 'mysql',
            'database_name' => 'psr_test',
            'server'        => '127.0.0.1',
            'username'      => 'root',
            'password'      => '',
            'charset'       => 'utf8'
        ],
    ],
    'slave'     => [
        0    => [
            'database_type' => 'mysql',
            'database_name' => 'psr_test',
            'server'        => '127.0.0.1',
            'username'      => 'root',
            'password'      => '',
            'charset'       => 'utf8'
        ],
    ]
];