<?php

namespace core\db;


class mysql
{
    public static $instance = '';

    public $client = '';

    public function __construct()
    {
        //连接本地的 Redis 服务
        $this->client = mysqli_connect('127.0.0.1', 'root', '', 'psr_test');
    }

    public static function instance() {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function client() {
        return $this->client;
    }

    public function query($sql) {
        $query = mysqli_query($this->client, $sql);
        return mysqli_fetch_all($query);
    }
}