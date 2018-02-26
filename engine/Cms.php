<?php

namespace Engine;

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
        $db = $this->di->get('test2');
        print_r($db);
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/product/{id}', 'ProductController:index');
    }   
}
?>