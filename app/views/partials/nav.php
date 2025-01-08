<?php 
$authUser = $instances['auth']::auth(); 

$routes = [
    'public' => [
        '/' => ['label' => 'Home', 'icon' => 'fa-th-large'],
        '/resume' => ['label' => 'Curriculo', 'icon' => 'fa-briefcase'],
        '/portifolio' => ['label' => 'Portfolio', 'icon' => 'fa-briefcase'],
        '/login' => ['label' => 'Login', 'icon' => 'fa-sign-in'],
        '/register' => ['label' => 'Register', 'icon' => 'fa-user-plus'],
        '/privacy-policy' => ['label' => 'Privacy Policy', 'icon' => 'fa-file-text-o'],
        '/terms-and-conditions' => ['label' => 'Terms & Conditions', 'icon' => 'fa-clipboard'],
    ],
    'auth' => [
        '/' => ['label' => 'Home', 'icon' => 'fa-th-large'],
        '/admin' => ['label' => 'Dashboard', 'icon' => 'fa-dashboard'],
        '/admin/users' => ['label' => 'Users', 'icon' => 'fa-user'],
        '/admin/blog-posts' => ['label' => 'Blog Posts', 'icon' => 'fa-file-text'],
        '/admin/portfolio' => ['label' => 'Portfolio Adm', 'icon' => 'fa-briefcase'],
        '/portifolio' => ['label' => 'Portfolio', 'icon' => 'fa-briefcase'],
        '/admin/resumes' => ['label' => 'Curriculo Adm', 'icon' => 'fa-id-card'],
        '/resume' => ['label' => 'Curriculo', 'icon' => 'fa-id-card'],
        '/logout' => ['label' => 'Logout', 'icon' => 'fa-sign-out'],
    ],
];
?>

<div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
    </a>
    <img src="<?php echo isset($authUser->image) ? $authUser->image : ''; ?>" style="width:45%;" class="w3-round"><br><br>
    <h4><b><?php echo isset($authUser->fullName) ? $authUser->fullName : 'Bem-vindo'; ?></b></h4>
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
<div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
</div>
