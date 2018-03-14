<?php
namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller{

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * AdminController constructor
     * @param \Engine\DI\DI $di
     */
    public function __construct($di){
        parent::__construct($di);

        $this->auth = new Auth();

        if(!$this->auth->authorized and $this->request->server['REQUEST_URI'] !== '/rovercms/admin/login/'){
            // redirect to login form
            header('Location: /rovercms/admin/login/', true, 301);
            exit;
        }
    }

}

?>