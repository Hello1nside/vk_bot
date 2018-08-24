<?php
/**
 * Created by PhpStorm.
 * User: ivzhenko.volodymyr
 * Date: 30.03.2018
 * Time: 12:34
 */

namespace core;

class Config
{
    protected static $username = 'root';
    protected static $password = 'abc1983***';
    protected static $servers = [
        's25-vm18' => ['host' => 'localhost', 'db' => 'vk_bot']
    ];
}