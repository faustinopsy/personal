<?php

require './iniciar.php';

try {
    $route->add('/admin', 'GET', 'AdminController:index');
    $route->add('/admin/users', 'GET', 'AdminUserController:index');
    $route->add('/admin/users/create', 'GET', 'AdminUserController:formCreate');
    $route->add('/admin/users/store', 'POST', 'AdminUserController:insert');
    $route->add('/admin/users/edit', 'GET', 'AdminUserController:formEdit');
    $route->add('/admin/users/update', 'POST', 'AdminUserController:update');
    $route->add('/admin/users/delete', 'POST', 'AdminUserController:delete');
  
    $route->init();
  } catch (Exception $e) {
    var_dump($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
  }
  