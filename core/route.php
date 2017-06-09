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

            // 路由这里需要考虑是否CGI
            $PATH_INFO = explode('/', $_SERVER['PATH_INFO']);
            debug::log($PATH_INFO);

            if(empty($PATH_INFO[1])) {
                $controller = 'index';
            } else {
                $controller = $PATH_INFO[1];
            }

            if(empty($PATH_INFO[2])) {
                $action = 'index';
            } else {
                $action = $PATH_INFO[2];
            }

            return [
                'controller'    => $controller,
                'action'        => $action,
            ];
    }
}