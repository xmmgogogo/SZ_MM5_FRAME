<?php

namespace core;

class front
{
    public $_route = [];
    public $_return = '';

    public function __construct()
    {
        // 如果是测试环境，则打开错误log
        if(config::get('config', 'is_debug')) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'on');
        }

        date_default_timezone_set('Asia/Shanghai');

        // 做一些页面初始化工作
        set_exception_handler('\core\front::doException');
        set_error_handler('\core\front::doError');

        // 因为没有捕捉fatal错误的方法，怎么办了，我们可以使用替代方案。
        register_shutdown_function('\core\front::shutdown');
    }

    public function run() {
        //路由解析
        //解析控制器方法调用
        //结果返回 | json html xml
        $this->route();
        $this->dispatch();
        $this->display();
    }

    public function route() {
        $this->route = route::analyze();
    }

    public function dispatch() {
        $dispatch = new dispatch();
        $this->_return = $dispatch->dispatch($this->route);
    }

    /**
     * 这里有个问题，为了能够兼容不同类型的返回类型，这里需要自定义处理类
     */
    public function display() {
        $display = new display();
        $display->show($this->_return);
    }

    /**
     * 捕获错误，进行保存
     * @param $message
     */
    public static function doException($errno, $errstr, $errfile, $errline) {
        echo 'doException<br>';
//        $message    = $e->getMessage();
//        $code       = $e->getCode();
//        $file       = $e->getFile();
//        $line       = $e->getLine();

        // 进行log存储
//        var_dump($message);
    }

    public static function doError($errno, $errstr, $errfile, $errline) {
        debug::show(func_get_args());
        debug::log(func_get_args(), 'Error');
    }

    /**
     * 这里咱们主要用来捕获fatal致命错误的替代方法。
     * @return bool
     */
    public static function shutdown() {
        $message = error_get_last();
        /**
         * array(
         *  type => 1 ,
         *  message => string,
         *  file => int ,
         *  line => int
         * )
         */
        if ($message == null) {
            return false;
        } else {
            echo 'fatal error<br>';
//            var_dump($message);
        }
    }
}