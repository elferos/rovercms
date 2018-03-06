<?php

namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRoute;

class Cms{
    /**
     * @var DI
     */
    private $di;

    public $router;

    /**
     * Cms constructor
     * @param [type] $di
     */
    public function __construct($di){
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * Run Cms
     * @return void
     */
    public function run(){
        try{
            // загрузим все роуты из файла
            require_once __DIR__.'/../cms/Route.php';

            // 
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathURL());
    
            if($routerDispatch == null){
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }
    
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
    
            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        }
        catch(\Exception $e){
            echo $e->getMessage();
            exit;
        }
    }   
}
?>