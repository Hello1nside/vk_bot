<?php
chdir(__DIR__);
require_once '/srv/www/mudrahel.com/me/vendor/autoload.php';

$postController = new \app\controller\PostsController();
$postController->postPublication();