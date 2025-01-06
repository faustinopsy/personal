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
echo '<link rel="stylesheet" href="'.$baseUrl .'/assets/css/fonts-google.css">';
echo '<link rel="stylesheet" href="'.$baseUrl .'/assets/css/font-awesome-4.7.0/css/font-awesome.min.css">';
?>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
</head>
<style>
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
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <?php $this->insert('partials/nav') ?>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px">

  <?php if (isset($_SESSION['flash_message'])): ?>
    <div class="w3-panel w3-<?= $_SESSION['flash_message']['type'] ?> text-center fade-out"" id="flash-message">
      <h3>Success!</h3>
        <?= $_SESSION['flash_message']['message'] ?>
    </div> 
    <?php unset($_SESSION['flash_message']); ?>
  <?php endif; ?>
 
 <!-- Section -->
  <div class="w3-container w3-padding-large w3-white">
    <?= $this->section('content') ?>
  </div>

  <footer class="w3-container w3-padding-32 w3-dark-grey">
    <?php $this->insert('partials/footer') ?>
  </footer>
  
</body>

</html>