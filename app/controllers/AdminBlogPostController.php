<?php

namespace app\controllers;

use app\models\BlogPost;
use app\library\Redirect;
use app\library\View;

class AdminBlogPostController
{
    public function index()
    {
        $posts = BlogPost::getAll();
        View::render('admin/blog-posts/index', [
            'title' => 'Gerenciar Blog Posts',
            'posts' => $posts,
        ]);
    }

    public function formCreate()
    {
        View::render('admin/blog-posts/create', [
            'title' => 'Adicionar Blog Post',
        ]);
    }

    public function insert()
    {
        $data = [
            'title' => strip_tags($_POST['title']),
            'slug' => strip_tags($_POST['slug']),
            'content' => strip_tags($_POST['content']),
            'author_id' => $_SESSION['auth']->id,
        ];
        
        if (BlogPost::insert($data)) {
            Redirect::message('/admin/blog-posts', 'Blog Post Adicionado com sucesso!');
            exit;
        }
        Redirect::message('/admin/blog-posts', 'Erro ao adicionar Blog Post!', 'red');
    }

    public function formEdit()
    {
        $id = strip_tags($_GET['id']);
        $post = BlogPost::where('id', $id);
        View::render('admin/blog-posts/edit', [
            'title' => 'Editar Blog Post',
            'post' => $post,
        ]);
    }

    public function update()
    {
        $id = strip_tags($_POST['id']);
        $data = [
            'title' => strip_tags($_POST['title']),
            'slug' => strip_tags($_POST['slug']),
            'content' => strip_tags($_POST['content']),
        ];

        if (BlogPost::update($id, $data)) {
            Redirect::message('/admin/blog-posts', 'Blog Post Atualizado com sucesso!');
            exit;
        }
        Redirect::message('/admin/blog-posts', 'Erro ao atualizar Blog Post!', 'red');
    }

    public function delete()
    {
        $id = strip_tags($_POST['id']);
        if (BlogPost::delete($id)) {
            Redirect::message('/admin/blog-posts', 'Blog Post Deletado com sucesso!');
            exit;
        }
        Redirect::message('/admin/blog-posts', 'Erro ao deletar Blog Post!', 'red');
    }
}
