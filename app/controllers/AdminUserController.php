<?php

namespace app\controllers;

use app\models\User;
use app\library\Redirect;
use app\library\View;
use app\library\AuthMiddleware;

class AdminUserController
{
    public function __construct()
    {
        AuthMiddleware::isAdmin();
    }

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
            'password' => password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT)
        ];

        if (!empty($_FILES['image']['name'])) {
            $uploadDirImages = dirname(__FILE__, 3) . '/public/uploads/';
            if (!file_exists($uploadDirImages)) {
                mkdir($uploadDirImages, 0755, true);
            }
    
            $image = $_FILES['image'];
            $imagePath = '/uploads/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $uploadDirImages . basename($image['name']));
            $data['image'] = $imagePath;
        }

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
            'isAdmin' => strip_tags($_POST['perfil']),
        ];

        if (!empty($_POST['password'])) {
            $data['password'] = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);
        }

        if (!empty($_FILES['image']['name'])) {
            $uploadDirImages = dirname(__FILE__, 3) . '/public/uploads/';
            if (!file_exists($uploadDirImages)) {
                mkdir($uploadDirImages, 0755, true);
            }
    
            $image = $_FILES['image'];
            $imagePath = '/uploads/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $uploadDirImages . basename($image['name']));
            $data['image'] = $imagePath;
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
