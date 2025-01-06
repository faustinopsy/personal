<?php
namespace app\models;
use app\database\models\Model;

class PasswordReset extends Model
{
    public static string $table = 'password_resets';
}
