<?php

namespace app\models;

use app\database\models\Model;

class ResumeTechnology extends Model
{
    public static string $table = 'resume_technologies';
    public readonly int $id;
    public readonly int $resume_id;
    public readonly string $name;
    public ?string $proficiency_level; // ENUM: 'beginner', 'intermediate', 'advanced', 'expert'
    public readonly string $created_at;
    public readonly string $updated_at;
}

