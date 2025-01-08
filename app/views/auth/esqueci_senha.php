<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $Lang::get('forgot_password_title', 'Esqueci a Senha') ?></h1>
    <form action="/esqueci_senha" method="POST">
        <div class="mb-3">
            <label for="email" class="w3-text-blue"><?= $Lang::get('email', 'Email') ?></label>
            <input type="email" name="email" id="email" class="w3-input w3-border" required>
        </div>
        <button type="submit" class="w3-button w3-green"><?= $Lang::get('send_reset_link_button', 'Enviar Link de Redefinição') ?></button>
    </form>
</section>
