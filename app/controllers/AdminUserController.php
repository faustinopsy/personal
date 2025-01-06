<?php

namespace app\controllers;

use app\models\User;

class AdminUserController
{

    public function index()
    {
        $users = User::getAll();
        var_dump($users );
    }

    public function formCreate()
    {
        
    }

    public function insert()
    {
        $data = [
            'firstName' => 'rodrigo',
            'lastName' => 'faust',
            'email' => 'xxx@gmail',
            'password' => password_hash('123', PASSWORD_DEFAULT),
        ];

        User::insert($data);

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
