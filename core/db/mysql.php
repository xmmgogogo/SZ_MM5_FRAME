<?php
namespace core\db;

// 废弃
class mysql extends \Medoo\Medoo
{
    public static $instance = '';

    public $client = '';

    public $db_index = '';

    public function __construct($db_num)
    {
        //连接本地的 Mysql 服务
        try {
            parent::__construct(
                [
                    'database_type' => 'mysql',
                    'database_name' => 'psr_test',
                    'server'        => '127.0.0.1',
                    'username'      => 'root',
                    'password'      => '',
                    'charset'       => 'utf8'
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception('db connect error. ' . $e->getMessage());
        }
    }

    public static function instance($db_num) {
        if(empty(self::$instance[$db_num])) {
            self::$instance[$db_num] = new self($db_num);
        }

        return self::$instance[$db_num];
    }

    public function client() {
        // ...
    }

    public function query_sql($table, $query = '*', $where = '') {
        $data = $this->select($table, $query, $where);

        return $data;
    }
}