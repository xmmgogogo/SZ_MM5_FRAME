<?php

namespace core;

class cacheBase
{
    public $local           = [];
    public $cacheEngine     = '';
    public $dbEngine        = '';

    public function __construct()
    {
        // 初始化缓存
        $cacheConfig = config::get('cache');

        // engine
        $cacheType = $cacheConfig['cacheType'];

        // cache
        $class = '\\core\\cache\\' . $cacheType . 'Helper';
        $this->cacheEngine = $class::instance()->client();

        $this->dbEngine = factory::get('dbBase');
    }

    public function getTableCache() {
        return $this->_table;
    }

    public function getPk($uId) {
        $key = $this->getTableCache();
//        debug::log($key);
        var_dump($this->local[$key]);
        // 从本地缓存里面读取
        if(empty($this->local[$key])) {
            // 从缓存里面读取
            $db_cache = $this->cacheEngine->hGet('db_cache', $key);
var_dump($db_cache);
            // 从数据库里面读取
            if(empty($db_cache)) {
                // todo
                $data = $this->dbEngine->get();
                var_dump($data);
            }
        }
    }

    public function updatePK() {

    }

    public function deletePK() {

    }

    public function addPK() {

    }
}