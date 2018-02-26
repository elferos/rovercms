<?php

namespace Engine\Core\Router;

class Router{

    private $routes = [];
    private $host;

    /**
     * Router constructor
     * @param [type] $host
     */
    public function __construct($host){
        $this->host = $host;
    }

    /**
     * @param [type] $key
     * @param [type] $pattern
     * @param [type] $controller
     * @param string $method
     */
    public function add($key, $pattern, $controller, $method = 'GET'){
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];

    }

}

?>