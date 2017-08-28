<?php

namespace core;

class debug
{
    public static function log($msg, $status = 'INFO') {
        // 读取全局配置，看看是否开启log
        $baseConfig = \core\config::get('config');

        if(isset($baseConfig['is_debug']) && $baseConfig['is_debug']) {
            // 开启log模式
            $logConfig = \core\config::get('log');

            $logType = $logConfig['type'] . 'Log';
            $class = "\\core\\logType\\{$logType}";

            $log = new $class();

            $log->save($msg, $status);
        }
    }

    public static function show($data) {
        dump($data);
    }
}