<?php

namespace Engine\Core\Router;

class Router{

    private $routes = [];
    private $dispatcher;
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
            'pattern'    => $pattern,
            'controller' => $controller,
            'method'     => $method
        ];

    }

    public function dispatch($method, $uri){
        $temp = $this->getDispatcher()->dispatch($method, $uri); 
        return $temp;
    }

    public function getDispatcher(){
        if($this->dispatcher == null){
            $this->dispatcher = new UrlDispatcher();
            
            foreach ($this->routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }
        
        return $this->dispatcher;
    }

}

?>