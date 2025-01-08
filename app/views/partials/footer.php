  <div class="w3-row-padding">
  <p class="m-0 text-center text-white">
    Copyright &copy; 
    <?= $Lang::get('mini_store', 'Fast Loja '); echo ' - ' . date("Y"); ?>
  </p>
  <div class="mt-2">
    <a href="/privacy-policy" class="text-white mx-2"><?= $Lang::get('privacy_policy', 'Política de Privacidade') ?></a> |
    <a href="/terms-and-conditions" class="text-white mx-2"><?= $Lang::get('terms_conditions', 'Termos e Condições') ?></a>
  </div>

  </div>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>