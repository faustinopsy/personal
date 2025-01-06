<?php

namespace app\models;
use app\database\models\Model;

class User extends Model
{
  public static string $table = 'users';
  public readonly int $id;
  public readonly string $firstName;
  public readonly string $lastName;
  public readonly string $email;
  public readonly string $password;
  public readonly string $created_at;
  public readonly string $updated_at;
  public readonly string $isAdmin;
  public ?string $two_fa_code;
  public ?string $two_fa_expires_at;
  public ?string $image;
}
