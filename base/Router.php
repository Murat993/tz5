<?php

namespace Base;

class Router
{
    protected $routes = [];

    public function register($httpMethod, $urlPattern, $controller, $method) {
        $httpMethod = strtolower($httpMethod);
        $this->routes[$httpMethod][$urlPattern] = [$controller, $method];
    }

    public function dispatch($httpMethod, $url, Request $request, Response $response) {
        $httpMethod = strtolower($httpMethod);
        foreach ($this->routes[$httpMethod] as $urlPattern => $route) {
            $regexPattern = preg_replace('~:([\w]+)~', '(?P<$1>[\w-]+)', $urlPattern);
            if (preg_match("~^$regexPattern$~", $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $request->params[$key] = $match;
                    }
                }
                array_shift($matches);
                $controller = $route[0];
                $method = $route[1];
                $matches[] = $request;
                $matches[] = $response;

                $controllerInstance = new $controller();
                call_user_func_array([$controllerInstance, $method], $matches);
                return;
            }
        }
        echo "404 Not Found";
    }
}