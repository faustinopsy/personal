<?php

namespace app\models;

use app\database\models\Model;

class Resume extends Model
{
    public static string $table = 'resumes';
    public readonly int $id;
    public readonly int $user_id;
    public readonly string $summary;
    public readonly string $created_at;
    public readonly string $updated_at;
}