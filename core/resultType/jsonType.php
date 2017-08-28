<?php

namespace core\resultType;

class jsonType implements resultType
{
    public function render($data)
    {
        // TODO: Implement render() method.

        echo $data ? json_encode($data) : '';die;
    }
}