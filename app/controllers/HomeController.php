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

  public function show()
  {
      $id = strip_tags($_GET['id']);
      $post = BlogPost::where('id', $id);

      if (!$post) {
          Redirect::message('/home', 'Postagem não encontrada!', 'red');
          exit;
      }

      View::render('blog/show', [
          'title' => $post->title,
          'post' => $post,
      ]);
  }

}
