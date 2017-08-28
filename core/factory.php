<?php
namespace core;


class factory
{
    public static $container = [];

    public static function get($key) {
        // 这里是new一个类
        // 还是在页面初始化的时候统一new全部，配置config文件

        if (substr($key, -7, 7) === 'Service') {
            $file_name = '\\app\\Service\\' . $key;
        } elseif(substr($key, -5, 5) === 'Model') {
            $file_name = '\\app\\Model\\' . $key;
        } else {
            $file_name = '\\core\\' . $key;
        }

        if(empty(self::$container[$key])) {
            self::set($key, $file_name);
        }

        return self::$container[$key];
    }

    public static function set($key, $file_name) {
        try {
            self::$container[$key] = new $file_name();
        } catch (\Exception $e) {
            throw new \Exception($file_name . ' not exist. ' . $e->getMessage());
        }
    }

    public static function del($key) {
        unset(self::$container[$key]);
    }
}