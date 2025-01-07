<?php

namespace app\controllers;

use app\library\View;
use app\library\AuthMiddleware;

class AdminController
{
    public function __construct()
    {
        AuthMiddleware::isAdmin();
    }
    
    public function index()
    {
        View::render('admin/index', [
            'title' => 'Painel Administrativo',
        ]);
    }
}
