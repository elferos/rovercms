<?php
namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var array
     */
    public $data = [];

    /**
     * AdminController constructor
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() == null) {
            // redirect to login form
            header('Location: /rovercms/admin/login/');
            exit;
        }
    }

    /**
     * @return void
     */
    public function checkAuthorization(){

    }

    public function logout()
    {
        $this->auth->unAuthorize();
        // redirect to login form
        header('Location: /rovercms/admin/login/');
        exit;
    }
}

?>