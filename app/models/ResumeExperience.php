<?php

namespace app\models;

use app\database\models\Model;

class ResumeExperience extends Model
{
    public static string $table = 'resume_experiences';
    public readonly int $id;
    public readonly int $resume_id;
    public readonly string $job_title;
    public readonly string $company_name;
    public readonly string $start_date;
    public ?string $end_date;
    public ?string $description;
    public readonly string $created_at;
    public readonly string $updated_at;
}
