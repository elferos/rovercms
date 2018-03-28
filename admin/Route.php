<?php
/** 
 * List routes
*/

$this->router->add('login', '/rovercms/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/rovercms/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/rovercms/admin/', 'DashboardController:index');
$this->router->add('logout', '/rovercms/admin/logout/', 'AdminController:logout');

// Pages Routes (GET)
$this->router->add('pages', '/rovercms/admin/pages/', 'PageController:listing');
$this->router->add('page-create', '/rovercms/admin/pages/create/', 'PageController:create');
$this->router->add('page-edit', '/rovercms/admin/pages/edit/(id:int)', 'PageController:edit');

// Pages Routes (POST)
$this->router->add('page-add', '/rovercms/admin/page/add/', 'PageController:add','POST');
$this->router->add('page-update', '/rovercms/admin/page/update/', 'PageController:update','POST');

?>