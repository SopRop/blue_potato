<?php
namespace Core\Utils;

trait SingletonTrait {
    public static $instance = null;

    public static function getInstance() {
        if (self::$instance === null)
            self::$instance = new static();

        return self::$instance;
    }
}