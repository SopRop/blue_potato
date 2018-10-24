<?php

$src = __DIR__ . '/../';

require_once $src . 'vendor/autoload.php';

Core\Config::broadcast($src);
Core\Router::route();