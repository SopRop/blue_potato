<?php

namespace Core;

class Router
{
    static protected $DEFAULT_CONTROLLER;
    static protected $DEFAULT_METHOD;

    private $route;
    private $controller;
    private $method;
    private $params;

    private function __construct($uri)
    {
        $this->route = $uri;
        if (! isset(self::$DEFAULT_CONTROLLER))
            self::$DEFAULT_CONTROLLER = conf('DEFAULT_CONTROLLER');
        if (! isset(self::$DEFAULT_METHOD))
            self::$DEFAULT_METHOD = conf('DEFAULT_METHOD');
    }

    private function getRoute() {
        $uri = $this->trimRoute();

        $this->controller = (isset($uri[0]) && $uri[0] !== "") ? $uri[0] : self::$DEFAULT_CONTROLLER;
        $this->method = (isset($uri[1]) && $uri[1] !== "") ? $uri[1] : self::$DEFAULT_METHOD;
        $this->params = array_slice($uri, 2);
    }

    private function execRoute()
    {
        $controllerCallerString = 'Controller\\' . ucfirst($this->controller) . 'Controller';
        $methodCallerString = lcfirst($this->method);

        if (class_exists($controllerCallerString))
        {
            $controller = new $controllerCallerString;
            call_user_func_array([$controller, $methodCallerString], $this->params );
        } else {
            // TODO: Implement proper throw or 404 display
        }
    }

    private function trimRoute()
    {
        $uri = substr($this->route, 1);
        $uris = explode('/', $uri);
        $uris = array_map(function($a) { return trim($a); }, $uris);

        return $uris;
    }

    public static function route()
    {
        $router = new Router($_SERVER['REQUEST_URI']);

        $router->getRoute();
        $router->execRoute();
    }
}