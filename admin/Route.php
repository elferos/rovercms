<?php
/** 
 * List routes
*/

$this->router->add('login', '/rovercms/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/rovercms/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/rovercms/admin/', 'DashboardController:index');
$this->router->add('logout', '/rovercms/admin/logout/', 'AdminController:logout');

?>