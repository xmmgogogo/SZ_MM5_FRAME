<?php
namespace core;

class display
{
    public function show($_return) {
        debug::log($_return);

        // 这里我们尝试将action处理之后的数据，塞到display统一处理和显示。
        try {
            $type = 'json';
            $data = '';

            isset($_return['data']['type']) && $type = $_return['data']['type'];
            isset($_return['data']['data']) && $data = $_return['data']['data'];

            $className = 'core\\resultType\\' . $type . 'Type';
            $resultType = new $className();
            $resultType->render($data);
        } catch (\Exception $e) {
            throw new \Exception('render template not exit', 102);
        }
    }
}