<?php

namespace app\models;

use app\database\models\Model;

class ResumeEducation extends Model
{
    public static string $table = 'resume_education';
    public readonly int $id;
    public readonly int $resume_id;
    public readonly string $degree;
    public readonly string $institution;
    public readonly string $start_date;
    public ?string $end_date;
    public ?string $description;
    public readonly string $created_at;
    public readonly string $updated_at;
}
