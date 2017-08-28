<?php

return [
    // 缓存类型
    'cacheType'     => 'redis',

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