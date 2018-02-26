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
        $this->router->add('product', '/rovercms/user/12', 'ProductController:index');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathURL());
        // var_dump(Common::getMethod());
        // var_dump(Common::getPathURL());
        // var_dump($this->router);
        print_r($routerDispatch);
        // var_dump($this->router);

        // print_r($_SERVER);
        // echo Common::getMethod();

        // print Common::getPathURL();
    }   
}
?>