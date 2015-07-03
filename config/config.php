<?php

define('DEBUG', true);
define('ENTITY_PATH', serialize([__DIR__.'/../src/App/Mvc/Models/Entities']));
define('DB_PARAMS', serialize([
	'host' => 'dev.local',
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '123',
    'dbname'   => 'webdevbr',
]));
define('PHP_HOST', serialize([
	'host' => 'localhost',
    'port' => '8080',
    'public_directory' => 'public',
]));