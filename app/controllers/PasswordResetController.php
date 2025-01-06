<?php
namespace app\controllers;

use app\library\View;
use app\models\User;
use app\library\Redirect;
use app\library\Mailer;
use app\models\PasswordReset;

class PasswordResetController
{
    public function showRequestForm()
    {
        return View::render('auth/esqueci_senha');
    }

    public function sendResetLink()
    {
        $email = strip_tags($_POST['email']);
        $user = User::where('email', $email);

        if (!$user) {
            Redirect::message('/esqueci_senha', 'E-mail não encontrado.', 'red');
        }

        $token = bin2hex(random_bytes(32));
        $resetLink = $_ENV['BASE_URL'] . "/reseta_senha?token={$token}";

        $existingReset = PasswordReset::where('email', $email);
        if ($existingReset) {
            PasswordReset::delete($existingReset->id);
        }

        PasswordReset::insert([
            'email' => $email,
            'token' => $token
        ]);

        Mailer::send(
            $email,
            "Redefinição de Senha",
            "Clique no link para redefinir sua senha: {$resetLink}",
            "From: no-reply@faustinopsy.com"
        );

        Redirect::message('/esqueci_senha', 'E-mail de redefinição enviado!');
    }
    public function showResetForm()
    {
        $token = $_GET['token'] ?? null;

        if (!$token) {
            Redirect::message('/', 'Token inválido.', 'red');
        }

        return View::render('auth/reseta_senha', ['token' => $token]);
    }

    public function reset()
    {
        $token = strip_tags($_POST['token']);
        $password = strip_tags($_POST['password']);

        $reset = PasswordReset::where('token', $token);

        if (!$reset) {
            Redirect::message('/esqueci_senha', 'Token inválido ou expirado.', 'red');
        }

        $user = User::where('email', $reset->email);
        if ($user) {
            User::update($user->id, [
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            PasswordReset::delete($reset->id);

            Redirect::message('/login', 'Senha redefinida com sucesso!');
        }

        Redirect::message('/esqueci_senha', 'Erro ao redefinir a senha.', 'red');
    }

}
