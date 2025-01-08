<?php $this->layout('template') ?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <form method="post" action="/login">
      <div class="form-outline mb-4">
        <input type="email" name="email" class="w3-input w3-border" placeholder="<?= $Lang::get('email_placeholder', 'Digite seu email') ?>" />
        <label class="w3-text-blue" for="form2Example1"><?= $Lang::get('email_label', 'Email') ?></label>
      </div>
      <div class="form-outline mb-4">
        <input type="password" name="password" class="w3-input w3-border" placeholder="<?= $Lang::get('password_placeholder', 'Digite sua senha') ?>" />
        <label class="w3-text-blue" for="form2Example2"><?= $Lang::get('password_label', 'Senha') ?></label>
      </div>
      <div style="display:flex;justify-content: space-between;">
        <button type="submit" class="w3-button w3-green"><?= $Lang::get('sign_in_button', 'Entrar') ?></button>
        <a href='/register' class="w3-button w3-grey"><?= $Lang::get('register', 'Cadastrar') ?></a>
        <a href='/esqueci_senha' class="w3-button w3-light-blue"><?= $Lang::get('forgot_password_title', 'Esqueci a Senha') ?></a>
      </div>
    </form>
    
  </div>
</section>
