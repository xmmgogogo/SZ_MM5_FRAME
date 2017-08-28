<?php
namespace core;

class dbBase extends \Medoo\Medoo
{
    public $dbInstance = [];

    public function __construct($num = 0)
    {
        // 初始化db解析
        if(empty($this->dbInstance[$num])) {
            $cacheConfig = config::get('db', 'master');
            parent::__construct($cacheConfig[$num]);
        }
    }

    public function _get($table, $query = '*', $where = '') {
        return $this->select($table, $query, $where);
    }

    public function _add($table, $param = []) {
        /**
         $last_user_id = $database->insert("account", [
            "user_name" => "foo",
            "email" => "foo@bar.com",
            "age" => 25
        ]);
         */
        $this->insert($table, $param);

        return $this->id();
    }

    public function _update($table, $param, $where) {
        return $this->update($table, $param, $where);
    }

    public function _delete($table, $where) {
        /*
         $database->delete("account", [
            "AND" => [
                "type" => "business"
                "age[<]" => 18
            ]
        ]);
         */

        return $this->delete($table, $where);
    }
}