<?php

namespace app\models;

use app\database\models\Model;

class ResumeSkill extends Model
{
    public static string $table = 'resume_skills';
    public readonly int $id;
    public readonly int $resume_id;
    public readonly string $skill_name;
    public readonly string $skill_type; // ENUM: 'soft', 'hard'
    public readonly string $created_at;
    public readonly string $updated_at;
}
