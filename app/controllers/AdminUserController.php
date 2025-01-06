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
        View::render('admin/users/create', [
            'title' => 'Adicionar Usuário',
        ]);
    }

    public function insert()
    {
        $data = [
            'firstName' => strip_tags($_POST['firstName']),
            'lastName' => strip_tags($_POST['lastName']),
            'email' => strip_tags($_POST['email']),
            'password' => password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT),
        ];

        if(User::insert($data)){
            Redirect::message('/admin/users', 'Usuário Adicionado com sucesso!');
            exit;
        }
        Redirect::message('/admin/users', 'Erro ao adicionar usuario!','red');
    }

    public function formEdit()
    {
        $id = strip_tags($_GET['id']);
        $user = User::where('id', $id);
        View::render('admin/users/edit', [
            'title' => 'Editar Usuário',
            'user' => $user,
        ]);
    }

    public function update()
    {
        $id = strip_tags($_POST['id']);
        $data = [
            'firstName' => strip_tags($_POST['firstName']),
            'lastName' => strip_tags($_POST['lastName']),
            'email' => strip_tags($_POST['email']),
        ];

        if (!empty($_POST['password'])) {
            $data['password'] = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
        }

        if(User::update($id, $data)){
            Redirect::message('/admin/users', 'Usuário Atualizado com sucesso!');
            exit;
        }
        Redirect::message('/admin/users', 'Erro ao Atualizar Usuário!','red');
        
    }

    public function delete()
    {
        $id = strip_tags($_POST['id']);
        if(User::delete($id)){
            Redirect::message('/admin/users', 'Usuário Deletado com sucesso!');
            exit;
        }
        Redirect::message('/admin/users', 'Erro ao Deletar Usuário!','red');
    }
}
