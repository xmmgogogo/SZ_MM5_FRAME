<?php

namespace app\Service;

use \core\factory;

class userService
{
    public $userModel = null;

    public function __construct()
    {
        // 测试调用dao层
        $this->userModel = factory::get('userModel');
    }

    public function getUser($uId) {
        return $this->userModel->getUser($uId);
    }

    public function addUser($data) {
        return $this->userModel->addUser($data);
    }

    public function updateUser($uId, $condition) {
        $this->userModel->updateUser($condition, ['id' => $uId]);
    }

    public function delUser($uId) {
        $this->userModel->delUser(['id' => $uId]);
    }
}