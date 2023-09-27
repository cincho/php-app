<?php

declare(strict_types=1);

use Framework\Autoloader\Autoloader;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/src/Framework/src/Autoloader/Autoloader.php';

Autoloader::register([
	'Api\\' => dirname(__DIR__) . '/src/Api',
	'App\\' => dirname(__DIR__) . '/src/App',
	'Framework\\' => dirname(__DIR__) . '/src/Framework/src',
	'Tests\\' => dirname(__DIR__) . '/tests',
]);
