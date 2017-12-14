<?php

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

define('APP_DEBUG',true);
// set_time_limit(0);
// 定义应用目录
define('THINK_PATH', 'ThinkPHP/');
require THINK_PATH.'ThinkPHP.php';
?>