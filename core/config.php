<?php

namespace core;

class config
{
    public static $config_cache = [];

    public static function get($configFile, $key = '') {
        if(empty(self::$config_cache[$configFile])) {
            self::$config_cache[$configFile] = require ROOT_PATH . '/config/' . $configFile . '.php';
        }

        if($key) {
            return isset(self::$config_cache[$configFile][$key]) ? self::$config_cache[$configFile][$key] : '';
        } else {
            return self::$config_cache[$configFile];
        }
    }
}