<?php

use app\library\Router;
use app\library\Lang;

require __DIR__.'/../vendor/autoload.php';

session_start();

ini_set('memory_limit', '1024M');
set_time_limit(0);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/logs/php_errors.log');
error_reporting(E_ALL);
 
if (!file_exists(__DIR__ . '/logs')) {
   mkdir(__DIR__ . '/logs', 0755, true);
}

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$defaultLanguage = 'pt';
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$language = $_SESSION['lang'] ?? $defaultLanguage;

Lang::setLanguage($language);

$route = new Router;