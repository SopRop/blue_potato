<?php
namespace Core;
use \Twig_Loader_Filesystem;
use \Twig_Environment;

class View
{
    static public function twig($view, $arg) {
        $loader = new Twig_Loader_Filesystem('../' . conf('VIEW_PATH'));
        $twig = new Twig_Environment($loader);
    
        echo $twig->render($view, $arg);
    }
}