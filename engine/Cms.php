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
            $this->router->add('home', '/rovercms/', 'HomeController:index');
            $this->router->add('news', '/rovercms/news', 'HomeController:news');
            $this->router->add('news_single', '/rovercms/news/(id:int)', 'HomeController:news');
    
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