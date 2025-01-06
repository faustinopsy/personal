<?php

namespace app\models;

use app\database\models\Model;

class ResumeSection extends Model
{
    public static string $table = 'resume_sections';
    public readonly int $id;
    public readonly int $resume_id;
    public readonly string $section_type; // ENUM: 'education', 'experience', 'soft_skills', 'hard_skills', 'technologies', 'others'
    public readonly string $title;
    public ?string $description;
    public readonly string $created_at;
    public readonly string $updated_at;
}
