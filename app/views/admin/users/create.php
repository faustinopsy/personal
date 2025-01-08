<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/users/store" method="POST" class="w3-container" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="firstName" class="w3-text-blue"><?= $Lang::get('first_name', 'Primeiro Nome') ?></label>
            <input type="text" name="firstName" id="firstName" class="w3-input w3-border"  required>
        </div>
        <div class="mb-3">
            <label for="lastName" class="w3-text-blue"><?= $Lang::get('last_name', 'Último Nome') ?></label>
            <input type="text" name="lastName" id="lastName" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="email" class="w3-text-blue"><?= $Lang::get('email', 'Email') ?></label>
            <input type="email" name="email" id="email" class="w3-input w3-border"  required>
        </div>
        <div class="mb-3">
            <label for="password" class="w3-text-blue"><?= $Lang::get('password', 'Senha') ?></label>
            <input type="password" name="password" id="password" class="w3-input w3-border">
        </div>
        <div class="mb-3">
            <label for="image" class="w3-text-blue"><?= $Lang::get('current_image', 'Foto') ?></label>
            <input type="file" name="image" id="image" class="w3-input w3-border" accept="image/*" required>
        </div>
        <button type="submit" class="w3-button w3-teal"><?= $Lang::get('save', 'Salvar') ?></button>
    </form>
</section>
