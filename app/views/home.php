<?php $this->layout('template'); ?>

<div class="container px-4 px-lg-5 mt-5">
  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
  <?php 
      $authUser = $instances['auth']::auth();
      if ($authUser && $authUser->isAdmin){
       echo "<p>Autenticado e admin</p>";
      } 
      elseif ($authUser){
        echo "<p>Autenticado</p>";
      }else{
        echo "<p>home</p>";
      }
      
      ?>
      home
  </div>
</div>
