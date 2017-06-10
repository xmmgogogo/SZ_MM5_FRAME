<?php

return [
    // db类型
    'dbType'        => 'mysql',

    // 缓存类型
    'cacheType'     => 'redis',

    // mysql数据库
    'db'    => [
        'master'    => [
            'ip'        => '127.0.0.1',
            'port'      => '3306',
            'user'      => 'root',
            'pwd'       => '',
            'db'        => 'psr_test',
        ],
        'slave'     => [
            'slave_1'    => [
                'ip'        => '127.0.0.1',
                'port'      => '3306',
                'user'      => 'root',
                'pwd'       => '',
                'db'        => 'psr_test',
            ],
            'slave_2'    => [
                'ip'        => '127.0.0.1',
                'port'      => '3306',
                'user'      => 'root',
                'pwd'       => '',
                'db'        => 'psr_test',
            ],
        ]
    ],

    // 缓存 - redis
    'redis' => [
        'redis_1'   => [
            'ip'        => '127.0.0.1',
            'port'      => '6379',
        ],
        'redis_2'   => [
            'ip'        => '127.0.0.1',
            'port'      => '6379',
        ],
    ],

    // 缓存 - memcache
    'memcache' => [
        'memcache_1'   => [
            'ip'        => '127.0.0.1',
            'port'      => '11270',
        ],
        'memcache_2'   => [
            'ip'        => '127.0.0.1',
            'port'      => '11270',
        ],
    ],
];