<?php

namespace core;

class request
{
    public static $request = [];

    public static function init() {
        self::$request = array_merge($_GET, $_POST, $_FILES, $_SERVER);
    }

    public static function get($key) {
        if(isset(self::$request[$key])) {
            return self::$request[$key];
        } else {
            return null;
        }
    }

    public static function set($key, $val) {
        self::$request[$key] = $val;
    }
}