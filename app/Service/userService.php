<?php

namespace app\Service;

use \core\factory;

class userService
{
    public function getUser($uId) {
        // 测试调用dao层
        $userModel = factory::get('userModel');
        $userModel->getUser($uId);
    }
}