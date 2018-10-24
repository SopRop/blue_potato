<?php

namespace Controller;

use Core\Controller;
use Core\View;

class HomeController extends Controller
{
    public function index()
    {
        View::twig('home.twig.html', [ "class" => self::class, "method" => __FUNCTION__, "args" => func_get_args()]);
    }
}