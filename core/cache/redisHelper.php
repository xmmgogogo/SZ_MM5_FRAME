<?php

namespace core\cache;

class redisHelper
{
    public static $instance = '';

    public $client = '';

    public function __construct()
    {
        //连接本地的 Redis 服务
        $this->client = new \Redis();
        $this->client->connect('127.0.0.1', 6379);
    }

    public static function instance() {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

//    public function __call($cmd, $param) {
//        return $this->client->$cmd($param);
//    }

    public function client() {
        return $this->client;
    }
}