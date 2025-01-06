<?php

namespace app\controllers;

use app\library\View;
use app\library\Redirect;
use app\models\User;
use Exception;
use app\library\Auth;

class TwoFactorController
{
    public function index()
    {
        return View::render('two_factor');
    }

    public function verify()
    {
        $userId = $_SESSION['2fa_user_id'] ?? null;

        if (!$userId) {
            Redirect::message('/login', 'Sessão inválida. Faça login novamente.');
        }

        $code = strip_tags($_POST['code']);

        $user = User::findId($userId);

        if (!$user || $user->two_fa_code !== $code || strtotime($user->two_fa_expires_at) < time()) {
            Redirect::message('/2fa', 'Código inválido ou expirado.');
        }

        unset($_SESSION['2fa_user_id']);
        $data=['two_fa_code' => null, 'two_fa_expires_at' => null];
        $user->update($userId,$data);

        Auth::loginAs($user);

        Redirect::to('/');
    }
}
