<?php

namespace app\Controller\Index;

use \core\factory;

class Index
{
    public $_view = [];
    function index() {

        // 复制这个类
        $this->_view['c1'] = 'c1';
        $this->_view['c2'] = 'c2';

        // 测试调用service层
        $userModel = factory::get('userService');
        $userModel->getUser(123);

        return [
            'type'      => 'html',  //html
            'template'  => 'Index/index.php',
            'data'  => [
                'name' => 'lmj',
                'data' => '123'
            ]
        ];
    }
}