<?php

namespace core\logType;

use League\Flysystem\Exception;

class fileLog implements logInterface
{
    public function save($msg, $status = 'INFO')
    {
        // TODO: Implement save() method.
        $logConfig = \core\config::get('log');

        $logSaveDir = $logConfig['saveType']['file']['dir'];

        if(file_exists($logSaveDir)) {
            $msgF       = '[' . $status . '] ' .  date('Y-m-d H:i:s') . PHP_EOL;
            $contents   = $msgF . json_encode($msg) . PHP_EOL;

            file_put_contents($logSaveDir . '/' . date('Y-m-d') . '.txt', $contents . PHP_EOL, 8);
        } else {
            throw new Exception('cache file not exit.', 101);//todo
        }
    }
}