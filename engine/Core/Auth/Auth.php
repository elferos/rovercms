<?php
namespace Engine\Core\Auth;

use Engine\Core\Cookie;

class Auth implements AuthInterface{
    /**
     * @var boolean
     */
    protected $authorized = false;
    protected $user;

    /**
     * @return void
     */
    public function authorized(){
        return $this->authorized;
    }

    /**
     * @return void
     */
    public function user(){
        return $this->user;
    }

    /**
     * User authorization
     *
     * @param [type] $user
     * @return void
     */
    public function authorize($user){
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);

        $this->authorized = true;
        $this->user       = $user;
    }

    /**
     * User unauthorization
     *
     * @return void
     */
    public function unAuthorize(){
        Cookie::delete('auth.authorized');
        Cookie::delete('auth.user');

        $this->authorized = false;
        $this->user       = null;
    }

    /**
     * Generates a new random password salt
     *
     * @return int
     */
    public static function salt(){
        return (string) rand(10000000, 99999999);
    }

    /**
     * Generates a hash
     *
     * @param [type] $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = ''){
        return hash('sha256', $password . $salt);
    }
}

?>