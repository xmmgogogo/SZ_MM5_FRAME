<?php
namespace app\Controller\Test;

use \core\factory;

class DbTest
{
    /**
     * @var userService
     */
    public $userService = null;

    public function __construct()
    {
        $this->userService = factory::get('userService');
    }

    public function exec() {

        // add
        $data = [
            'id' => rand(1000, 2000),
            'name' => rand(1000, 2000) . ':name',
            'age' => rand(1, 2000),
        ];
        $uId = $this->userService->addUser($data);

        // update
        $data = [
            'name' => 'update-name'
        ];
        $this->userService->updateUser($uId, $data);

        // del
//        $this->userService->delUser($uId);

        // read
        $userInfo = $this->userService->getUser($uId);
        dump($userInfo);

        return [];
    }
}