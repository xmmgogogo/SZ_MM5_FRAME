<?php

namespace core;

class config
{
    public static $config_cache = [];

    public static function get($configFile, $key = '') {
        if(empty(self::$config_cache[$configFile])) {
            $file_name = ROOT_PATH . '/config/' . $configFile . '.php';

            if(file_exists($file_name)) {
                self::$config_cache[$configFile] = require ROOT_PATH . '/config/' . $configFile . '.php';
            } else {
                // 如果使用了命名空间，则全局类，必须前面加\，比如：throw new \Exception
                throw new \Exception('config file not exit.', 100);//todo
            }
        }

        if($key) {
            return isset(self::$config_cache[$configFile][$key]) ? self::$config_cache[$configFile][$key] : '';
        } else {
            return self::$config_cache[$configFile];
        }
    }
}