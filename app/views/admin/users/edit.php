<?php $this->layout('template'); ?>

<section class="w3-container"">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/users/update" method="POST" class="w3-container" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <div class="mb-3">
            <label for="firstName" class="w3-text-blue"><?= $Lang::get('first_name', 'Primeiro Nome') ?></label>
            <input type="text" name="firstName" id="firstName" class="w3-input w3-border" value="<?= $user->firstName ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastName" class="w3-text-blue"><?= $Lang::get('last_name', 'Último Nome') ?></label>
            <input type="text" name="lastName" id="lastName" class="w3-input w3-border" value="<?= $user->lastName ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="w3-text-blue"><?= $Lang::get('email', 'Email') ?></label>
            <input type="email" name="email" id="email" class="w3-input w3-border" value="<?= $user->email ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="w3-text-blue"><?= $Lang::get('password', 'Senha') ?></label>
            <input type="password" name="password" id="password" class="w3-input w3-border">
        </div>
        <div class="mb-3">
        <label for="perfil" class="w3-text-blue">Perfil</label>
            <select name="perfil" id="perfil" class="w3-input w3-border" required>
            <option value="<?= $user->isAdmin ?>"><?= $user->isAdmin ? 'Admin': 'Comum'; ?></option>
                <option value="0">Comum</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="w3-text-blue"><?= $Lang::get('current_image', 'Foto') ?></label>
            <input type="file" name="image" id="image" class="w3-input w3-border" accept="image/*">
        </div>
        <button type="submit" class="w3-button w3-light-blue"><?= $Lang::get('update', 'Atualizar') ?></button>
    </form>
</section>
