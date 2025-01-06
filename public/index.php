<?php

require './iniciar.php';

try {
    $route->add('/home', 'GET', 'HomeController:index');
    $route->add('/login', 'GET', 'LoginController:index');
    $route->add('/login', 'POST', 'LoginController:store');
    $route->add('/register', 'GET', 'RegisterController:index');
    $route->add('/register', 'POST', 'RegisterController:store');
    $route->add('/2fa', 'GET', 'TwoFactorController:index');
    $route->add('/2fa', 'POST', 'TwoFactorController:verify');
    $route->add('/privacy-policy', 'GET', 'PageController:privacyPolicy');
    $route->add('/terms-and-conditions', 'GET', 'PageController:termsAndConditions');
    $route->add('/esqueci_senha', 'GET', 'PasswordResetController:showRequestForm');
    $route->add('/esqueci_senha', 'POST', 'PasswordResetController:sendResetLink');
    $route->add('/reseta_senha', 'GET', 'PasswordResetController:showResetForm');
    $route->add('/reseta_senha', 'POST', 'PasswordResetController:reset');
    $route->add('/admin', 'GET', 'AdminController:index');
    $route->add('/admin/users', 'GET', 'AdminUserController:index');
    $route->add('/admin/users/create', 'GET', 'AdminUserController:formCreate');
    $route->add('/admin/users/store', 'POST', 'AdminUserController:insert');
    $route->add('/admin/users/edit', 'GET', 'AdminUserController:formEdit');
    $route->add('/admin/users/update', 'POST', 'AdminUserController:update');
    $route->add('/admin/users/delete', 'POST', 'AdminUserController:delete');
    $route->add('/logout', 'GET', 'LoginController:destroy');
    $route->add('/admin/blog-posts', 'GET', 'AdminBlogPostController:index');
    $route->add('/admin/blog-posts/create', 'GET', 'AdminBlogPostController:formCreate');
    $route->add('/admin/blog-posts/store', 'POST', 'AdminBlogPostController:insert');
    $route->add('/admin/blog-posts/edit', 'GET', 'AdminBlogPostController:formEdit');
    $route->add('/admin/blog-posts/update', 'POST', 'AdminBlogPostController:update');
    $route->add('/admin/blog-posts/delete', 'POST', 'AdminBlogPostController:delete');

    $route->init();
  } catch (Exception $e) {
    var_dump($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
  }
  