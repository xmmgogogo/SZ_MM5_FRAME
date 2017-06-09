<?php

define('ROOT_PATH', __DIR__);

require ROOT_PATH . '/core/autoLoad.php';

spl_autoload_register('core\autoLoad::load');

define('IS_CGI', (false !== strpos(PHP_SAPI, 'cgi')) ? 1 : 0);

$front = new \core\front();
$front->run();