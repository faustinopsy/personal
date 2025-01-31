<?php

namespace app\library;

use app\models\User;
use stdClass;

class Auth
{
  public static function loginAs(User $user)
  {
    if (!isset($_SESSION['auth'])) {
      $stdClas = new stdClass;
      $stdClas->id = $user->id;
      $stdClas->firstName = $user->firstName;
      $stdClas->lastName = $user->lastName;
      $stdClas->fullName = $user->firstName . ' ' . $user->lastName;
      $stdClas->isAdmin = $user->isAdmin ?? false;
      $stdClas->image = $user->image;
      $_SESSION['auth'] = $stdClas;
    }
  }

  public static function auth()
  {
    return $_SESSION['auth'] ?? null;
  }

  public static function logout()
  {
    if (isset($_SESSION['auth'])) {
      unset($_SESSION['auth']);
    }
  }
}
