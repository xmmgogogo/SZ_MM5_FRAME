<?php
namespace app\Model;

class userModel extends \core\model
{
    protected $_table = 'user';
    protected $_pk = 'id';      //主键
    protected $_sk = '';        //次主键

    public $_table_default = [
            'id'      => 0,
            'name'    => 0,
            'age'     => 0,
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($uId) {
        return $this->getByPk('user', ['id' => $uId]);
    }

    public function addUser($data) {
        return $this->addByPK('user', $data);
    }

    public function updateUser($param, $where) {
        $this->updateByPK('user', $param, $where);
    }

    public function delUser($where) {
        $this->deleteByPK('user', $where);
    }
}