<?php

namespace app\models;

use app\database\models\Model;

class PortfolioItem extends Model
{
    public static string $table = 'portfolio_items';
    public readonly int $id;
    public readonly string $title;
    public readonly string $description;
    public ?string $image;
    public ?string $category;
    public readonly string $created_at;
    public readonly string $updated_at;
    public readonly int $user_id;
}
