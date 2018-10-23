<?php

namespace Core;

class Router
{
    const DEFAULT_CONTROLLER = "Home";
    const DEFAULT_ACTION = "Index";

    private $route;
    private $controller;
    private $method;
    private $params;

    private function __construct($uri)
    {
        $this->route = $uri;
    }

    private function getRoute() {
        $uri = $this->trimRoute();

        $this->controller = $uri[0] !== null ? $uri[0] : self::DEFAULT_CONTROLLER;
        $this->method = $uri[1] !== null ? $uri[1] : self::DEFAULT_ACTION;
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