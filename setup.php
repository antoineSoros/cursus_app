<?php

define('ROOT', realpath(__DIR__));
define('DAO', ROOT . '/dao');
define('CONTROLLER', ROOT . '/controller');
define('VIEW', ROOT . '/view');
define('CONFIG_FILE_PATH', ROOT . '/config.ini');
define('MODEL', ROOT . '/model');

include 'vendor/autoload.php';