<?php
namespace core\cache;

// 这里必须让他们实现一个统一的接口
class redisHelper implements cacheInterface
{
    public static $instance = '';

    public $client = '';

    public function __construct($ip, $port)
    {
        //连接本地的 Redis 服务
        try {
            $this->client = new \Redis();
            $this->client->connect($ip, $port);
        } catch (\Exception $e) {
            throw new \Exception('redis connect error . ');
        }
    }

    public static function instance($ip, $port) {
        if(!self::$instance) {
            self::$instance = new self($ip, $port);
        }

        return self::$instance;
    }

    public function call($cmd, $param) {
        return call_user_func_array([$this->client, $cmd], $param);
    }

    public function hGet($key, $value) {
        $data = $this->client->hGet($key, $value);

        return json_decode($data, true);
    }

    public function hSet($key, $subKey, $value) {
        return $this->client->hSet($key, $subKey, json_encode($value));
    }

    public function hDel($key, $subKey) {
        return $this->client->hDel($key, $subKey);
    }

    public function client() {
        return $this->client;
    }
}