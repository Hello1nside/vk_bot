<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/') {
    $uri = explode('/', $uri)[1];
}
define('URI', $uri);
define('ROOT', __DIR__);

require_once __DIR__ . '/vendor/autoload.php';

#just for debug
function dd($var = false, $p = false)
{
    if (!$var) die('Just die');
    if ($p) echo '<pre>' . print_r($var, 1) . '</pre>';
    else var_dump($var);
    exit;
}


\core\App::run();