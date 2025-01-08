<?php
$authUser = $instances['auth']::auth();

$routes = [
    'public' => [
        '/' => ['label' => $Lang::get('home', 'Home'), 'icon' => 'fa-th-large'],
        '/resume' => ['label' => $Lang::get('resume', 'Currículo'), 'icon' => 'fa-briefcase'],
        '/portifolio' => ['label' => $Lang::get('portfolio', 'Portfólio'), 'icon' => 'fa-briefcase'],
        '/login' => ['label' => $Lang::get('login', 'Login'), 'icon' => 'fa-sign-in'],
        '/register' => ['label' => $Lang::get('register', 'Registrar-se'), 'icon' => 'fa-user-plus'],
        '/privacy-policy' => ['label' => $Lang::get('privacy_policy', 'Política de Privacidade'), 'icon' => 'fa-file-text-o'],
        '/terms-and-conditions' => ['label' => $Lang::get('terms_conditions', 'Termos e Condições'), 'icon' => 'fa-clipboard'],
    ],
    'auth' => [
        '/' => ['label' => $Lang::get('home', 'Home'), 'icon' => 'fa-th-large'],
        '/admin' => ['label' => $Lang::get('dashboard', 'Painel'), 'icon' => 'fa-dashboard'],
        '/admin/users' => ['label' => $Lang::get('users', 'Usuários'), 'icon' => 'fa-user'],
        '/admin/blog-posts' => ['label' => $Lang::get('blog_posts', 'Postagens do Blog'), 'icon' => 'fa-file-text'],
        '/admin/portfolio' => ['label' => $Lang::get('portfolio_adm', 'Administração de Portfólio'), 'icon' => 'fa-briefcase'],
        '/portifolio' => ['label' => $Lang::get('portfolio', 'Portfólio'), 'icon' => 'fa-briefcase'],
        '/admin/resumes' => ['label' => $Lang::get('resume_adm', 'Administração de Currículos'), 'icon' => 'fa-id-card'],
        '/resume' => ['label' => $Lang::get('resume', 'Currículo'), 'icon' => 'fa-id-card'],
        '/logout' => ['label' => $Lang::get('logout', 'Sair'), 'icon' => 'fa-sign-out'],
    ],
];
?>

<div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo isset($authUser->image) ? $authUser->image : ''; ?>" style="width:45%;" class="w3-round"><br><br>
    <h4><b><?php echo isset($authUser->fullName) ? $authUser->fullName : $Lang::get('welcome', 'Bem-vindo'); ?></b></h4>
</div>
<div class="w3-bar-block">
    <?php 
    if ($authUser): 
        foreach ($routes['auth'] as $path => $route): ?>
            <a href="<?php echo $path; ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">
                <i class="fa <?php echo $route['icon']; ?> fa-fw w3-margin-right"></i>
                <?php echo $route['label']; ?>
            </a>
        <?php 
        endforeach; 
    else:
        foreach ($routes['public'] as $path => $route): ?>
            <a href="<?php echo $path; ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-padding">
                <i class="fa <?php echo $route['icon']; ?> fa-fw w3-margin-right"></i>
                <?php echo $route['label']; ?>
            </a>
        <?php
        endforeach;
    endif;
    ?>
</div>
<div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding" type="button" id="languageDropdown">
        <i class="fa fa-language" aria-hidden="true"></i> <?= $Lang::get('language', 'Idioma') ?>
    </button>
    <ul class="w3-dropdown-content w3-bar-block w3-border">
        <li><a class="w3-bar-item w3-button" href="?lang=pt"><?= $Lang::get('portuguese', 'Português') ?></a></li>
        <li><a class="w3-bar-item w3-button" href="?lang=en"><?= $Lang::get('english', 'Inglês') ?></a></li>
        <li><a class="w3-bar-item w3-button" href="?lang=es"><?= $Lang::get('spanish', 'Espanhol') ?></a></li>
        <li><a class="w3-bar-item w3-button" href="?lang=ch"><?= $Lang::get('chinese', '中文') ?></a></li>
        <li><a class="w3-bar-item w3-button" href="?lang=jp"><?= $Lang::get('japanese', '日本語') ?></a></li>
    </ul>
</div>
<div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
</div>
