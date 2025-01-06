<?php

use app\controllers\AdminUserController;

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

// $conexao = Connection::connect();
// var_dump($conexao);

//test busca
$user = new AdminUserController();
$user->index();
//test insert
$user->insert();
$user->index();
//$user->formEdit();
//$user->delete();
//$user->index();