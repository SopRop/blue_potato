<?php

namespace Core;

use Core\View;

class ErrorHandler
{
    static public function displayHttpErrorView($errorCode) {
        View::twig(conf('VIEW_ERROR_PATH') . $errorCode . '.twig.html', []);
    }
}