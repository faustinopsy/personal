<?php

namespace app\controllers;

use app\library\View;
use app\models\User;
use app\library\Redirect;
use Exception;

class RegisterController
{
    public function index()
    {
        View::render('auth/register', [
            'title' => 'Cadastro de Usuário'
        ]);
    }

    public function store()
    {
        try {
            $firstName = strip_tags($_POST['firstName']);
            $lastName = strip_tags($_POST['lastName']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            if (!$email) {
                Redirect::message('/register', 'Email inválido.', 'red');
            }

            if ($password !== $confirmPassword) {
                Redirect::message('/register', 'As senhas não coincidem.', 'red');
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => $hashedPassword,
            ];
            User::insert($data);
            Redirect::message('/login', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            Redirect::message('/register', $e->getMessage(), 'red');
        }
    }
}
