<?php

namespace app\controllers;

use app\library\View;
use app\library\Redirect;
use app\models\User;
use app\library\Auth;
use Exception;
use app\library\Mailer;

class LoginController
{
  public function index()
  {
    return View::render('login');
  }

  public function store()
  {
      $email = strip_tags($_POST['email']);
      $password = strip_tags($_POST['password']);
  
      $user = User::where('email', $email);
  
      if (!$user || !password_verify($password, $user->password)) {
          Redirect::message('/login', 'Usuário ou senha inválidos!','red');
      }
  
      $twoFaCode = rand(100000, 999999);
      $expiresAt = date('Y-m-d H:i:s', strtotime('+10 minutes'));
  
      $data = ['two_fa_code' => $twoFaCode,'two_fa_expires_at' => $expiresAt];
      $user->update($user->id, $data);
  
      if (!Mailer::send(
        $user->email,'Seu Código de Verificação',"Seu código de verificação é: {$twoFaCode}. Ele expira em 10 minutos."
      )) {
          Redirect::message('/login', 'Erro ao enviar o email. Tente novamente mais tarde.','red');
      }
  
      $_SESSION['2fa_user_id'] = $user->id;
  
      Redirect::to('/2fa');
  }
  

  public function destroy()
  {
    Auth::logout();

    Redirect::message('/login', 'Usuário ou senha inválidos!','red');
    
  }
}
