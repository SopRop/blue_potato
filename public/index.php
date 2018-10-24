<?php
require_once __DIR__ . "/../vendor/autoload.php";
use Core\View;


$arr = [['name' => 'Jon','age' => 5], ['name' => 'Jon','age' => 5], ['name' => 'Jon','age' => 5]];

View::twig('user.twig.html', $arr);