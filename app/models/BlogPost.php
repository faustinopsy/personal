<?php

namespace app\models;

use app\database\models\Model;

class BlogPost extends Model
{
    public static string $table = 'blog_posts';
    public readonly int $id;
    public readonly string $title;
    public readonly string $slug;
    public readonly string $content;
    public readonly string $created_at;
    public readonly string $updated_at;
    public readonly int $author_id;
}