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

        if (isset($this->request->get['logout'])) {
            $this->auth->unAuthorize();
        }

        $this->checkAuthorization();
    }

    /**
     * @return void
     */
    public function checkAuthorization(){

        if($this->auth->hashUser() !== null) {
            $this->auth->authorize($this->auth->hashUser());
        }

        if(!$this->auth->authorized()){
            // redirect to login form
            header('Location: /rovercms/admin/login/', true, 301);
            exit;
        }
    }
}

?>