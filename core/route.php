<?php

namespace core;

class route
{
    public static function analyze() {
        /**
            Array
            (
                [page] => 11
            )

            Array
            (
                [DOCUMENT_ROOT] => E:\wamp64\www\AllPHPFrames\MM5
                [REMOTE_ADDR] => 127.0.0.1
                [REMOTE_PORT] => 62758
                [SERVER_SOFTWARE] => PHP 5.6.25 Development Server
                [SERVER_PROTOCOL] => HTTP/1.1
                [SERVER_NAME] => 127.0.0.1
                [SERVER_PORT] => 9000
                [REQUEST_URI] => /index/index?page=11
                [REQUEST_METHOD] => GET
                [SCRIPT_NAME] => /index.php
                [SCRIPT_FILENAME] => E:\wamp64\www\AllPHPFrames\MM5\index.php
                [PATH_INFO] => /index/index
                [PHP_SELF] => /index.php/index/index
                [QUERY_STRING] => page=11
                [HTTP_HOST] => 127.0.0.1:9000
            )
         */

        // 初始化request接口
        request::init();

        // 这里我们替换为统一用配置路由的方式，实现代码
        $server_path_info = request::get('PATH_INFO');
        if(empty($server_path_info) || $server_path_info == '/') {
            $server_path_info = '/index/index';
        } else {
            $c = explode('/', $server_path_info);

            // 如果传入的值少于2个，则默认加个index
            if(count($c) < 3) {
                $server_path_info .= '/index';
            }
        }

        $routeConfig = config::get('route');
        $routeIndex = '';
        $param = [];
        foreach ($routeConfig as $routeL => $routeInfo) {
            foreach ($routeInfo as $routeR => $actionIndex) {
                $routeL = str_replace('/', '\/', $routeL);
                $routeR = str_replace('/', '\/', $routeR);

                if(preg_match("/^{$routeL}{$routeR}$/", $server_path_info, $match)) {
                    $routeIndex = $actionIndex;

                    unset($match[0]);
                    $param = array_values($match);

                    // 直接退出
                    break;
                }
            }
        }

        if(empty($routeIndex)) {
            die('invalid url:' . $_SERVER['PATH_INFO']);
        }

        // 路由这里需要考虑是否CGI
        debug::log($routeIndex);

        $routeList = explode('@', $routeIndex);
        if(empty($routeList[0])) {
            $controller = 'index';
        } else {
            $controller = $routeList[0];
        }

        if(empty($routeList[1])) {
            $action = 'index';
        } else {
            $action = $routeList[1];
        }

        return [
            'controller'    => $controller,
            'action'        => $action,
            'param'         => $param,
        ];
    }
}