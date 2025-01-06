# Portfolio Website

Este projeto é um **site de portfólio dinâmico** desenvolvido com PHP puro, utilizando o padrão **MVC clássico** e sem arquitetura REST. O objetivo do site é oferecer um layout moderno e funcional, onde o conteúdo é gerenciado de forma dinâmica por uma área administrativa, ideal para exibir projetos, habilidades e informações de contato.

## 🚀 Tecnologias Utilizadas

O site desenvolvido com as seguintes tecnologias e ferramentas:

- **PHP Puro**: Linguagem principal do backend, sem uso de frameworks, garantindo simplicidade e desempenho.
- **Padrão MVC Clássico**: Estrutura do código organizada em Modelos, Controladores e Views, facilitando a manutenção e escalabilidade do projeto.
- **League\Plates**: Biblioteca de templates para PHP, responsável por gerenciar e renderizar as Views de forma eficiente.
- **HTML5, CSS3 e W3.CSS**: Para criar uma interface moderna e responsiva.
- **Font Awesome**: Biblioteca de ícones para enriquecer a experiência visual.
- **JavaScript (Vanilla)**: Para funcionalidades interativas básicas, como manipulação de menus e animações.
- **Monolítico**: Toda a aplicação (frontend e backend) é servida como um único sistema integrado, sem APIs REST ou microserviços.

## ⚙️ League\Plates\Engine

O **League\Plates** é uma biblioteca de templates leve e eficiente para PHP. Utilizamos essa ferramenta para separar a lógica da apresentação, permitindo:

- **Herança de Templates**: Reutilização de estruturas HTML comuns, como cabeçalhos e rodapés.
- **Passagem de Dados**: Possibilidade de enviar variáveis do controlador para as Views.
- **Modularização**: Separação de componentes (parciais) como menus, rodapés e cabeçalhos.

### Exemplo de Uso no Projeto

No projeto, utilizamos o `League\Plates\Engine` para renderizar templates de forma dinâmica. Aqui está um exemplo:

**Configuração da Engine no Backend:**
```php
use League\Plates\Engine;

class View
{
    public static function render($template, $data = [])
    {
        $engine = new Engine(__DIR__ . '/../views');
        echo $engine->render($template, $data);
    }
}
```

### Template Principal (master.php)

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Portfolio Website' ?></title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <header>
        <?= $this->insert('partials/header') ?>
    </header>
    <main>
        <?= $this->section('content') ?>
    </main>
    <footer>
        <?= $this->insert('partials/footer') ?>
    </footer>
</body>
</html>
```

### Renderização no Controlador

```php
class Portifolio{
    public function index()
    {
        $projects = Project::all();
        View::render('portfolio', [
            'title' => 'My Portfolio',
            'projects' => $projects,
        ]);
    }
}
```
## 🛠️ Funcionalidades
Menu Dinâmico: Gerado com base em configurações do backend.
Filtros de Portfólio: Filtragem de projetos por categoria (Design, Fotos, Arte, etc.).
Área de Contato: Formulário funcional para envio de mensagens.
Layout Responsivo: Compatível com dispositivos móveis e desktops.
Área Administrativa: Para gerenciar conteúdo do portfólio.

## 📂 Estrutura de Pastas
A organização do projeto segue uma estrutura simples e eficiente:
```
project/
├── app/
│   ├── controllers/
│   ├── models/
│   └── views/
│       ├── partials/
│       └── templates/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── vendor/
├── public/
│   └── index.php
└── .env
```


## Pré-requisitos e Instalação
Clone o repositório:
```
git clone https://github.com/faustinopsy/personal.git
```
### Configure o ambiente no arquivo .env:
arquivo .env
```
STRIPE_KEY=token do striper se for receber dinhero
DATABASE_NAME=a01_teste
DATABASE_HOST=localhost
DATABASE_USER=root
DATABASE_PASSWORD=root123
BASE_URL=http://localhost:1230
EMAIL=conta de email
SENHA=senha para envio de email
APP_SECRET_KEY=53xy69
```
## Instale as dependências com o Composer:
```
composer install
```
## Inicie um servidor local:

```
php -S localhost:8000 -t public
```

## 📋 Contribuições
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

## 📜 Licença
Este projeto é licenciado sob a MIT License.