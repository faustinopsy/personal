<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Site pessoal para portifolio" />
  <meta name="author" content="Rodrigo Faustino" />
  <title>Portifolio</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <?php
 $baseUrl = $_ENV['BASE_URL'];

echo '<link rel="stylesheet" href="'.$baseUrl .'/assets/css/w3.css">';
echo '<link rel="stylesheet" href="'.$baseUrl .'/assets/plugin/markdown/simplemde.min.css">';
echo '<script src="'.$baseUrl .'/assets/plugin/markdown/simplemde.min.js" defer></script>';
echo '<script src="'.$baseUrl .'/assets/plugin/markdown/custom-markdown.js" defer></script>';
echo '<link rel="stylesheet" href="'.$baseUrl .'/assets/css/fonts-google.css">';
echo '<link rel="stylesheet" href="'.$baseUrl .'/assets/css/font-awesome-4.7.0/css/font-awesome.min.css">';
?>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
a{cursor: pointer;}
    .fade-out {
      opacity: 1;
      transition: opacity 1s ease-out;
    }

    .fade-out.hidden {
      opacity: 0;
      pointer-events: none;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const flashMessage = document.getElementById('flash-message');
      if (flashMessage) {
        setTimeout(() => {
          flashMessage.classList.add('hidden');
          flashMessage.style.display='none';
        }, 3000);
      }
    });
  </script>
  </head>
  <body>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <?php $this->insert('partials/nav') ?>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px">
<header id="portfolio">
    <a href="#"><span style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <div class="w3-section w3-bottombar w3-padding-16">
      <a href='/home' class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i>Blog</a>
      <a href='/portifolio' class="w3-button w3-white w3-hide-small"><i class="fa fa-briefcase w3-margin-right"></i>Portifólio</a>
      <a href='/resume' class="w3-button w3-white w3-hide-small"><i class="fa fa-id-card w3-margin-right"></i>Curriculo</a>
    </div>
    </div>
  </header>
  <?php if (isset($_SESSION['flash_message'])): ?>
    <div class="w3-panel w3-<?= $_SESSION['flash_message']['type'] ?> text-center fade-out"" id="flash-message">
        <?= $_SESSION['flash_message']['message'] ?>
    </div> 
    <?php unset($_SESSION['flash_message']); ?>
  <?php endif; ?>
 
  <div class="w3-main w3-padding-large w3-white">
    <?= $this->section('content') ?>
  </div>

  <footer class="w3-container w3-padding-32 w3-dark-grey">
    <?php $this->insert('partials/footer') ?>
  </footer>
  
</body>

</html>