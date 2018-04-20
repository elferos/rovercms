<?php
/**
 * List of routes in the Admin environment
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
$this->router->add('page-add', '/rovercms/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/rovercms/admin/page/update/', 'PageController:update', 'POST');

// Posts Routes (GET)
$this->router->add('posts', '/rovercms/admin/posts/', 'PostController:listing');
$this->router->add('post-create', '/rovercms/admin/posts/create/', 'PostController:create');
$this->router->add('post-edit', '/rovercms/admin/posts/edit/(id:int)', 'PostController:edit');
// Posts Routes (POST)
$this->router->add('post-add', '/rovercms/admin/post/add/', 'PostController:add', 'POST');
$this->router->add('post-update', '/rovercms/admin/post/update/', 'PostController:update', 'POST');

// Settings Routes (GET)
$this->router->add('settings-general', '/rovercms/admin/settings/general/', 'SettingController:general');