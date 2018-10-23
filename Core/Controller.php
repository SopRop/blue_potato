<?php

namespace Core;

class Controller {

    public function __call($function, $args) {
        // TODO: Implements proper throw or 404
        echo 'Bad action, Harry';
    }
}