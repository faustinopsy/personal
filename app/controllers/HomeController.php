<?php

namespace app\controllers;

use app\library\View;
use app\models\BlogPost;

class HomeController
{
  public function index()
  {
        $posts = BlogPost::getAll();
        View::render('home', [
            'title' => 'Blog Posts',
            'posts' => $posts,
        ]);
  }
}
