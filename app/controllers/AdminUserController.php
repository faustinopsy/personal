<?php

namespace app\controllers;

use app\models\User;
use app\library\Redirect;
use app\library\View;

class AdminUserController
{

    public function index()
    {
        $users = User::getAll();
        View::render('admin/users/index', [
            'title' => 'Gerenciar Usuários',
            'users' => $users,
        ]);
    }

    public function formCreate()
    {
        
    }

    public function insert()
    {
        $data = [
            'firstName' => 'rodrigo',
            'lastName' => 'faust',
            'email' => 'xxx3@gmail',
            'password' => password_hash('123', PASSWORD_DEFAULT),
        ];

        if(User::insert($data)){
            Redirect::message('/admin/users', 'Usuário Adicionado com sucesso!');
            exit;
        }
        Redirect::message('/admin/users', 'Erro ao adicionar usuario!');
    }

    public function formEdit()
    {
        $id = 5;
        $user = User::where('id', $id);
        var_dump($user);exit;
        
    }

    public function update()
    {
        $id = 5;
        $data = [
            'firstName' => 'qqqqqqq',
            'lastName' => 'cccccccc',
            'email' => 'abc@123.com',
        ];

        
        User::update($id, $data);

    }

    public function delete()
    {
        $id = 5;
        User::delete($id);

    }
}
