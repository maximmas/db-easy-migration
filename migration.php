<?php
require_once 'vendor/autoload.php';
require_once 'config.php';


$dbHandler = \DEM\DB::getInstance();

(new \DEM\Migration(pdo: $dbHandler->connect()))->run();