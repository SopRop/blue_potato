<?php

use Core\Config;

if (! function_exists('env')) {
    function env($key, $default = "") {
        return Config::getInstance()->getenv($key, $default);
    }
}

if (! function_exists('conf')) {
    function conf($key) {
        return Config::getInstance()->getConf($key);
    }
}