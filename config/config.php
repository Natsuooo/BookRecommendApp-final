<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:host=localhost;dbname=login');
define('DB_USERNAME','natsuo');
define('DB_PASSWORD', 'd8skcadfw9');

//define('DSN', 'mysql:host=mysql2.star.ne.jp;dbname=natsu_elen');
//define('DB_USERNAME','natsu_me');
//define('DB_PASSWORD', 'n00286203');

define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST']);

require_once(__DIR__.'/../lib/functions.php');

require_once(__DIR__.'/autoload.php');

session_start();