<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center">Cadastro de Usuário</h1>
    <form action="/register" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="firstName" class="w3-text-blue"><?= $Lang::get('first_name', 'Primeiro Nome') ?></label>
            <input type="text" name="firstName" id="firstName" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="lastName" class="w3-text-blue"><?= $Lang::get('last_name', 'Último Nome') ?></label>
            <input type="text" name="lastName" id="lastName" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="email" class="w3-text-blue"><?= $Lang::get('email', 'Email') ?></label>
            <input type="email" name="email" id="email" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="password" class="w3-text-blue"><?= $Lang::get('password', 'Senha') ?></label>
            <input type="password" name="password" id="password" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="w3-text-blue"><?= $Lang::get('password', 'Confirmar Senha') ?></label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="w3-input w3-border" required>
        </div>
        <div style="display:flex;justify-content: space-between;">
            <button type="submit" class="w3-button w3-green"><?= $Lang::get('register', 'Cadastrar') ?></button>
            <a href='/login' class="w3-button w3-light-blue"><?= $Lang::get('sign_in_button') ?></a>
        </div>
    </form>
    <br>
    
</section>
