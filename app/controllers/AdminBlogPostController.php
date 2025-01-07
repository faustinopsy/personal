<?php

namespace app\controllers;

use app\models\BlogPost;
use app\library\Redirect;
use app\library\View;
use app\library\AuthMiddleware;

class AdminBlogPostController
{
    public function __construct()
    {
        AuthMiddleware::isAdmin();
    }

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

    public function generateContent()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $title = strip_tags($data['title'] ?? '');
        $slug = strip_tags($data['slug'] ?? '');

        if (!$title || !$slug) {
            echo json_encode(['error' => 'Título e slug são obrigatórios.']);
            http_response_code(400);
            return;
        }

        $cachedContent = $this->checkCache($title, $slug);
        if ($cachedContent) {
            echo json_encode(['content' => $cachedContent]);
            return;
        }

        $response = $this->fetchFromApi($title, $slug);
        if ($response['status'] === 'success') {
            $generatedContent = $response['content'];

            $this->updateCache($title, $slug, $generatedContent);

            echo json_encode(['content' => $generatedContent]);
            return;
        }

        echo json_encode(['error' => 'Erro ao gerar conteúdo.', 'details' => $response['details']]);
        http_response_code(500);
    }

    private function checkCache(string $title, string $slug): ?string
    {
        $cacheDir = __DIR__ . '/cache/';
        $cacheFile = $cacheDir . 'blog_content.json';
    
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }
    
        if (!file_exists($cacheFile)) {
            file_put_contents($cacheFile, json_encode([]));
        }
    
        $cache = json_decode(file_get_contents($cacheFile), true);
    
        $cacheKey = md5($title . $slug);
        return $cache[$cacheKey] ?? null;
    }
    
    private function updateCache(string $title, string $slug, string $content): void
    {
        $cacheDir = __DIR__ . '/cache/';
        $cacheFile = $cacheDir . 'blog_content.json';
    
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }
    
        $cache = json_decode(file_get_contents($cacheFile), true);
        $cacheKey = md5($title . $slug);
    
        $cache[$cacheKey] = $content;
        file_put_contents($cacheFile, json_encode($cache, JSON_PRETTY_PRINT));
    }
    

    private function fetchFromApi(string $title, string $slug): array
    {
        $apiKey = $_ENV['OPEN_IA'];
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        $requestData = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Você é um assistente especializado em criar conteúdo para blogs, em português do Brasil.',
                ],
                [
                    'role' => 'user',
                    'content' => "Crie um conteúdo detalhado para um blog com o título: '{$title}' e a descrição breve: '{$slug}'.",
                ],
            ],
            'max_tokens' => 800,
        ];

        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer {$apiKey}",
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($statusCode === 200) {
            $responseData = json_decode($response, true);
            return [
                'status' => 'success',
                'content' => $responseData['choices'][0]['message']['content'] ?? '',
            ];
        }

        $errorDetails = json_decode($response, true);
        return [
            'status' => 'error',
            'details' => $errorDetails['error'] ?? ['message' => 'Erro desconhecido', 'code' => 'código não informado'],
        ];
    }

}
