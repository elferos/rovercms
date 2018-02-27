<?php

namespace Engine;

use Engine\Helper\Common;

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
        // $db = $this->di->get('db');
        // print_r($db);
        $this->router->add('home', '/rovercms/', 'HomeController:index');
        $this->router->add('news', '/rovercms/news', 'HomeController:news');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathURL());
        list($class, $action) = explode(':', $routerDispatch->getController(), 2);

        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());

    }   
}
?>