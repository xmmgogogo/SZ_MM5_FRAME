<?php

namespace app\Model;

class userModel extends \core\cacheBase
{
    protected $_table = 'user';
    protected $_pk = 'id';      //主键
    protected $_sk = '';        //次主键

    public $_table_default
        = array(
            'id'      => 0,
            'name'    => 0,
            'age'     => 0,
        );

    public function getUser($uId) {
        return $this->getPk($uId);
    }

    public function addUser($uId) {

    }

    public function updateUser($uId) {

    }

    public function delUser($uId) {

    }
}