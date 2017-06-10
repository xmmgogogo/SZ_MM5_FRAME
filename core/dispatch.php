<?php

namespace core;

class dispatch
{
    public function dispatch($routeInfo = []) {
        // 这里我们让每个类里面只做一件事情
        // user/register
        // user/login
        // 这跟网页系统是不一样的，网页系统，是一个文件里面会做多种事情。
        if($routeInfo) {
            $class = '\\app\\Controller\\' . ucwords($routeInfo['controller']) . '\\' . ucwords($routeInfo['controller']);
            $action = $routeInfo['action'];
        } else {
            $class = '\\app\\Controller\\Index\\Index';
            $action = 'index';
        }

        $obj = new $class();
        $result = call_user_func_array([$obj, $action], []);

        return [
            'data'          => $result,
            'actionClass'   => $obj
        ];
    }
}