<?php

namespace app\library;

use app\library\Auth;
use app\library\Redirect;

class AuthMiddleware
{
    public static function isAdmin()
    {
        $user = Auth::auth();

        if (!$user || !isset($user->isAdmin) || !$user->isAdmin) {
            Redirect::to('/login');
            exit;
        }
    }
}
