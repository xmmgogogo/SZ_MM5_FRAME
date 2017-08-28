<?php
namespace core;

class model
{
    public $local           = [];
    public $cacheEngine     = '';
    public $dbEngine        = '';

    /**
     * @var dbBase
     */
    public $dbBase;

    public function __construct()
    {
        // 初始化缓存
        $this->cacheEngine = factory::get('cacheBase');

        // 初始化DB
        $this->dbEngine = factory::get('dbBase');
    }

    public function getTableName() {
        return $this->_table;
    }

    public function getPk() {
        return $this->_pk;
    }

    public function getSk() {
        return $this->_sk;
    }

    public function getByPk($table, $where) {
        if(empty($where[$this->getPk()])) {
            throw new \Exception("not exist Pk name : {$this->getPk()}");
        } else {
            $uId = $where[$this->getPk()];
        }

        $key = $this->getTableName() . ':' . $uId;

        // 从本地缓存里面读取
        if(empty($this->local[$key])) {
            // 从缓存里面读取
            $data = $this->cacheEngine->hGet($key, $uId);
//            $data = '';

            // 从数据库里面读取 TODO
            if(empty($data)) {
                $data = $this->dbEngine->_get($table, '*', $where);
                $this->cacheEngine->hSet($key, $uId, $data);
            }

            $this->local[$key] = $data;
        }

        return $this->local[$key];
    }

    public function updateByPK($table, $param, $where) {
        if(empty($where[$this->getPk()])) {
            throw new \Exception('not exist Pk');
        } else {
            $uId = $where[$this->getPk()];
        }

        $status = $this->dbEngine->_update($table, $param, $where);
        if($status) {
            $key = $this->getTableName() . ':' . $uId;
            $cache = $this->cacheEngine->hGet($key, $uId);
            dump($cache);
            $cache = array_merge($cache, $param);
            $this->cacheEngine->hSet($key, $uId, $cache);
            $this->local[$key] = $cache;
        }
    }

    public function deleteByPK($table, $where) {
        if(empty($where[$this->getPk()])) {
            throw new \Exception('not exist Pk');
        } else {
            $uId = $where[$this->getPk()];
        }

        $status = $this->dbEngine->_delete($table, $where);
        if($status) {
            $key = $this->getTableName() . ':' . $uId;
            $this->cacheEngine->hDel($key, $uId);
            $this->local[$key] = null;
        }
    }

    public function addByPK($table, $param) {
        $uId = $this->dbEngine->_add($table, $param);
        if($uId) {
            $key = $this->getTableName() . ':' . $uId;
            $this->cacheEngine->hSet($key, $uId, $param);
            $this->local[$key] = $param;
        } else {
            throw new \Exception("add table {$table} error.");
        }

        return $uId;
    }

    public function exec($table, $columns, $where) {
        return $this->dbEngine->select($table, $columns, $where);
    }
}