<?php
namespace Core;

use Dotenv\Dotenv;
use Core\Utils\Singleton;
use Core\Utils\SingletonTrait;

class Config implements Singleton {
    use SingletonTrait;

    private $config;

    public static function broadcast($fromPath)
    {
        self::$instance = new Config($fromPath);
        self::$instance->config = require_once $fromPath . '/config/main.php';
    }

    private function __construct($dotenvPath)
    {
        $env = new Dotenv($dotenvPath);
        $env->load();
    }

    public function getEnv($key, $default = "") {
        return getenv($key) ? getenv($key) : $default;
    }

    public function getconf($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }
        // TODO: Throw proper error
        return null;
    }
}