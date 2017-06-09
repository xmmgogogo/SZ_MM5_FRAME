<?php

namespace core;

class autoLoad
{
    public static $instance = [];

    /**
     * 实现一个自动加载类
     * @param $class
     * @return mixed
     */
    public static function load($class) {
        if(empty(self::$instance[$class])) {
            require $class . ".php";

            self::$instance[$class] = $class;
        }

        return self::$instance[$class];
    }
}