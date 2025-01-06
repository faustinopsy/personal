<?php $this->layout('template') ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <form method="post" action="/login">
      <div class="form-outline mb-4">
        <input type="email" name="email" class="w3-input w3-border" placeholder="Digite o email" />
        <label class="w3-text-blue" for="form2Example1">Email</label>
      </div>
      <div class="form-outline mb-4">
        <input type="password" name="password" class="w3-input w3-border" placeholder="Digite a senha" />
        <label class="w3-text-blue" for="form2Example2">Senha</label>
      </div>
      <div style="display:flex;justify-content: space-between;">
        <button type="submit" class="w3-button w3-green">Entrar</button>
        <a href='/register' class="w3-button w3-grey">register</a>
        <a href='/esqueci_senha' class="w3-button w3-light-blue">Esqueci a senha</a>
      </div>
    </form>
    
  </div>
</section>
