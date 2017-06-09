<?php


return [
    // 是否开启debug模式
    'is_debug'  =>  true,

    // 当前选择的存储方式
    'type'      => 'file',

    'saveType'   => array(
        'file'  =>  array(
                    // 存放模式
                    'name'    => 'file',
                    // 文件存放目录
                    'dir'     => 'cache'
                ),

        'mongodb'  => array(
                    // 缓存存放
                    'name'    => 'mongodb',
                    'ip'      => ''
                ),
    )
];