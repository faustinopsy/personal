@echo off

mkdir app
mkdir app\controllers
mkdir app\models
mkdir app\views
mkdir app\views\partials
mkdir app\views\templates

mkdir assets
mkdir assets\css
mkdir assets\js
mkdir assets\images

mkdir vendor

mkdir public

cd public
echo <?php echo "Hello, World!"; > index.php
cd ..

:: Criar o arquivo .env
echo BASE_URL=http://localhost> .env
echo APP_SECRET=your-secret-key>> .env

:: Concluir
echo Estrutura do projeto criada com sucesso!
pause
