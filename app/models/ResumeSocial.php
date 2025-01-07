<?php

namespace app\models;

use app\database\models\Model;

class ResumeSocial extends Model
{
    public static string $table = 'resume_socials';
    public readonly int $id;
    public readonly int $resume_id;
    public readonly string $platform;
    public readonly string $url;
    public readonly string $created_at;
    public readonly string $updated_at;
}
