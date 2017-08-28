<?php

namespace app\Controller\Index;

use \core\factory;

class Index
{
    public $_view = [];

    /**
     * @var userService
     */
    public $userService = null;

    public function __construct()
    {
        $this->userService = factory::get('userService');
    }

    function exec() {

        // 复制这个类
        $this->_view['c1'] = 'c1';
        $this->_view['c2'] = 'c2';

        // 测试调用service层

        $userInfo = $this->userService->getUser(2);

        dump($userInfo);die;

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