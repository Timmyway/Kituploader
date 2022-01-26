<?php

use App\Autoloader;
use App\Core\Main;

define('ROOT', dirname(__DIR__));
define('SITE', 'http://localhost/learnphp');

require_once ROOT.'/Autoloader.php';
Autoloader::register();

// Instanciate main
$app = new Main();
$app->start();