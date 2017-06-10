<?php

namespace core;

use League\Flysystem\Exception;

class display
{
    public function show($_return) {
        debug::log($_return);

        // 这里我们尝试将action处理之后的数据，塞到display统一处理和显示。
        try {
            $className = 'core\\resultType\\' . $_return['data']['type'] . 'Type';
            $resultType = new $className();
            $resultType->render($_return);
        } catch (Exception $e) {
            throw new Exception('render template not exit', 102);
        }
    }
}