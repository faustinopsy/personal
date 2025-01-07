<?php

namespace app\controllers;

use app\models\PortfolioItem;
use app\library\Redirect;
use app\library\View;
use app\library\AuthMiddleware;

class AdminPortfolioController
{
    public function __construct()
    {
        AuthMiddleware::isAdmin();
    }

    public function index()
    {
        $portfolioItems = PortfolioItem::getAll();
        View::render('admin/portfolio/index', [
            'title' => 'Gerenciar Portfolio',
            'portfolioItems' => $portfolioItems,
        ]);
    }

    public function formCreate()
    {
        View::render('admin/portfolio/create', [
            'title' => 'Adicionar Item ao Portfolio',
        ]);
    }

    public function insert()
    {
        $uploadDirImages = dirname(__FILE__, 3) . '/public/uploads/portfolio/';
        if (!file_exists($uploadDirImages)) {
            mkdir($uploadDirImages, 0777, true);
        }

        $image = $_FILES['image'];
        $imagePath = '/uploads/portfolio/' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $uploadDirImages . basename($image['name']));

        $data = [
            'title' => strip_tags($_POST['title']),
            'description' => strip_tags($_POST['description']),
            'category' => strip_tags($_POST['category']),
            'image' => $imagePath,
            'user_id' => $_SESSION['auth']->id,
        ];

        if (PortfolioItem::insert($data)) {
            Redirect::message('/admin/portfolio', 'Item Adicionado com sucesso!');
            exit;
        }
        Redirect::message('/admin/portfolio', 'Erro ao adicionar Item!', 'red');
    }

    public function formEdit()
    {
        $id = strip_tags($_GET['id']);
        $portfolioItem = PortfolioItem::where('id', $id);
        View::render('admin/portfolio/edit', [
            'title' => 'Editar Item do Portfolio',
            'portfolioItem' => $portfolioItem,
        ]);
    }

    public function update()
    {
        $id = strip_tags($_POST['id']);
        $data = [
            'title' => strip_tags($_POST['title']),
            'description' => strip_tags($_POST['description']),
            'category' => strip_tags($_POST['category']),
        ];

        if (!empty($_FILES['image']['name'])) {
            $uploadDirImages = dirname(__FILE__, 3) . '/public/uploads/portfolio/';
            if (!file_exists($uploadDirImages)) {
                mkdir($uploadDirImages, 0777, true);
            }

            $image = $_FILES['image'];
            $imagePath = '/uploads/portfolio/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $uploadDirImages . basename($image['name']));
            $data['image'] = $imagePath;
        }

        if (PortfolioItem::update($id, $data)) {
            Redirect::message('/admin/portfolio', 'Item Atualizado com sucesso!');
            exit;
        }
        Redirect::message('/admin/portfolio', 'Erro ao Atualizar Item!', 'red');
    }

    public function delete()
    {
        $id = strip_tags($_POST['id']);
        if (PortfolioItem::delete($id)) {
            Redirect::message('/admin/portfolio', 'Item Deletado com sucesso!');
            exit;
        }
        Redirect::message('/admin/portfolio', 'Erro ao Deletar Item!', 'red');
    }
}
