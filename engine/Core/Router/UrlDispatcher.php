<?php

namespace Engine\Core\Router;

class UrlDispatcher{
    /**
     * @var array
     */
    private $methods = [
        'GET',
        'POST'
    ];

    /**
     * @var array
     */
    private $routes = [
        'GET'  => [],
        'POST' => []
    ];

    /**
     * @var array
     */
    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-z\.\-_%]+',
        'any' => '[a-zA-z0-9\.\-_%]+',
    ];

    /**
     * @param [type] $key
     * @param [type] $pattern
     */
    public function addPattern($key, $pattern){
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param [type] $method
     * @return array|mixed
     */
    public function routes($method){
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    public function register($method, $pattern, $controller){
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    /**
     * @param [type] $method
     * @param [type] $uri
     * @return DispatchedRoute|void
     */
    public function dispatch($method, $uri){
        $routes = $this->routes(strtoupper($method));
        if(array_key_exists($uri, $routes)){
            return new DispatchedRoute($routes[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    /**
     * @param [type] $method
     * @param [type] $uri
     * @return DispatchedRoute
     */
    private function doDispatch($method, $uri){
        foreach ($this->routes($method) as $route => $controller) {
            $pattern = '#^'. $route . '$#s';

            if (preg_match($pattern, $uri, $parameters)) {
                return new DispatchedRoute($controller, $parameters);
            }
        }
    }
}


?>