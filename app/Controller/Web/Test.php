<?php
namespace app\Controller\Web;

class Test
{
    public function exec($p1 = '', $p2 = '') {
//        dump([$p1, $p2]);
//        dump('Web/Test/exec()');

        $data = ['name' => $p1, 'age' => $p2, 'time' => date('Y-m-d H:i:s')];

//        echo json_encode($data);die;

        return [
            'type'  => 'json',
            'data'  => $data,
        ];
    }
}