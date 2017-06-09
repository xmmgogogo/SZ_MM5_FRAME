<?php

namespace core;

class front
{
    public $_route = [];
    public $_data = '';

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
        $this->_data = $dispatch->dispatch($this->route);
    }

    public function display() {
        $display = new display();
        $display->show($this->_data);
    }
}