<?php

namespace Controller;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo 'Sample controller name: ' . self::class . ', sample method name: ' . __FUNCTION__;
        echo '<br>';
        echo 'Sample args print_r: ';
        print_r(func_get_args());
    }
}