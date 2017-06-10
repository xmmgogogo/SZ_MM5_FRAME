<?php

namespace core\resultType;

class jsonType implements resultType
{
    public function render($_return)
    {
        // TODO: Implement render() method.
        $data           = $_return['data']['data'];

        echo json_encode($data);
    }
}