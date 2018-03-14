<?php
/** 
 * List routes
*/

$this->router->add('login', '/rovercms/admin/login/', 'LoginController:form');
$this->router->add('dashboard', '/rovercms/admin/', 'DashboardController:index');

?>