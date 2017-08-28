<?php
namespace core;

class cacheBase
{
    public $cacheEngine = '';

    public function __construct()
    {
        // 初始化缓存
        $cacheConfig = config::get('cache');

        // engine
        $cacheType = $cacheConfig['cacheType'];

        $class = '\\core\\cache\\' . $cacheType . 'Helper';
        $this->cacheEngine = $class::instance($cacheConfig[$cacheType]['redis_1']['ip'], $cacheConfig[$cacheType]['redis_1']['port']);
    }

    public function hGet($key, $value) {
        return $this->cacheEngine->hGet($key, $value);
    }

    public function hSet($key, $subKey, $value) {
        return $this->cacheEngine->hSet($key, $subKey, $value);
    }

    public function hDel($key, $subKey) {
        return $this->cacheEngine->hDel($key, $subKey);
    }
}