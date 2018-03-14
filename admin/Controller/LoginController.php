<?php
namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class LoginController extends Controller{

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * LoginController constructor
     * @param DI $di
     */
    public function __construct(DI $di){
        parent::__construct($di);

        $this->auth = new Auth();
    }

    /**
     * @return void
     */
    public function form(){
        print_r($_COOKIE);
        $this->view->render('login');
    }

    public function authAdmin(){
        $params = $this->request->post;

        $this->auth->authorize('sdsddsds');
        print_r($params);
    }
}


?>