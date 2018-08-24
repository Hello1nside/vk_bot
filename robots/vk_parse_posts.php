<?php
/**
 * Created by PhpStorm.
 * User: Yevhenii Mudrahel
 * Date: 12.08.2018
 * Time: 15:05
 */

chdir(__DIR__);
require_once '/srv/www/mudrahel.com/me/vendor/autoload.php';

$postsController = new app\controller\PostsController();
$postsController->parse();