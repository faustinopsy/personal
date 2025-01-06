<?php $this->layout('template'); ?>

<section class="w3-container"">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/users/update" method="POST" class="w3-container" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <div class="mb-3">
            <label for="firstName" class="w3-text-blue">Primeiro Nome</label>
            <input type="text" name="firstName" id="firstName" class="w3-input w3-border" value="<?= $user->firstName ?>" required>
        </div>
        <div class="mb-3">
            <label for="lastName" class="w3-text-blue">Último Nome</label>
            <input type="text" name="lastName" id="lastName" class="w3-input w3-border" value="<?= $user->lastName ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="w3-text-blue">Email</label>
            <input type="email" name="email" id="email" class="w3-input w3-border" value="<?= $user->email ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="w3-text-blue">Senha (deixe em branco para não alterar)</label>
            <input type="password" name="password" id="password" class="w3-input w3-border">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="w3-button w3-light-blue">Atualizar</button>
    </form>
</section>
