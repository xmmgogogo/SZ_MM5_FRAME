<?php

return [
    '/index' => [
        '/index' => 'Index@index',
    ],

    '/web' => [
        '/test/(.*?)/(.*?)'   => 'Web@test',
    ],

    '/test' => [
        '/db'   => 'Test@dbTest',
    ],
];