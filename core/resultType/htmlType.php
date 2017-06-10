<?php

namespace core\resultType;

class htmlType implements resultType
{
    public function render($_return)
    {
        //这里使用模板

        // 返回的页面数据
        $data           = $_return['data']['data'];

        // 指定的模板
        $template       = $_return['data']['template'];

        // 返回的是index/index的类对象，可以直接实现模板
        $actionClass    = $_return['actionClass'];


        require ROOT_PATH . '/app/View/' . $template;

        die;
//        require_once(ROOT_PATH . '/lib3rd/smarty/Autoloader.php');
//        \Smarty_Autoloader::register();
//        $smarty = new \Smarty();
//        var_dump($smarty);
//        die;
//
//        $smarty->setTemplateDir(ROOT_PATH . '/app/Controller/' . $template);
//        $smarty->setCompileDir(ROOT_PATH . '/cache/smarty/template_c/');
//        $smarty->setConfigDir(ROOT_PATH . '/cache/smarty/configs/');
//        $smarty->setCacheDir(ROOT_PATH . '/cache/smarty/cache/');
//
//        $smarty->assign('name','Ned');
//
//        $smarty->display('index.tpl');
    }
}