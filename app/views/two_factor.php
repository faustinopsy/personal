<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $Lang::get('two_factor_validation', 'Validação em Dois Fatores') ?></h1>
    <p class="text-center"><?= $Lang::get('enter_code_email', 'Insira o código enviado para seu email.') ?></p>

    <form action="/2fa" method="POST">
        <div class="mb-3">
            <label for="code" class="w3-text-blue"><?= $Lang::get('verification_code', 'Código de Verificação') ?></label>
            <input type="text" id="code" name="code" class="w3-input w3-border" required>
        </div>
        <button type="submit" class="w3-button w3-green"><?= $Lang::get('verify', 'Verificar') ?></button>
    </form>
</section>
