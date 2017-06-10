<?php

define('ROOT_PATH', __DIR__);

require ROOT_PATH . '/core/autoLoad.php';

define('IS_CGI', (false !== strpos(PHP_SAPI, 'cgi')) ? 1 : 0);

spl_autoload_register('\core\autoLoad::load');

$front = new \core\front();
$front->run();