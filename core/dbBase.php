<?php

namespace core;

class dbBase
{
    public $dbEngine = '';

    public function __construct()
    {
        // 初始化db解析
        $cacheConfig = config::get('cache');

        // db engine
        $dbType = $cacheConfig['dbType'];

        $class = '\\core\\db\\' . $dbType;
        $this->dbEngine = $class::instance();
    }

    public function get() {
        return $this->dbEngine->query('select * from user');
    }

    public function add() {

    }

    public function update() {

    }

    public function delete() {

    }
}