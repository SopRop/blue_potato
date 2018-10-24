<?php
use Helper\View as View;
require_once __DIR__ . "/../vendor/autoload.php";

$arr = [['name' => 'Jon','age' => 5], ['name' => 'Jon','age' => 5], ['name' => 'Jon','age' => 5]];

View::twig('user.twig.html', $arr);