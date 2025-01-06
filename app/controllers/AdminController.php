<?php

namespace app\controllers;

use app\library\View;

class AdminController
{
    
    public function index()
    {
        View::render('admin/index', [
            'title' => 'Painel Administrativo',
        ]);
    }
}
