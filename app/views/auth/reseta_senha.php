<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center">Redefinir Senha</h1>
    <form action="/reseta_senha" method="POST">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <div class="mb-3">
            <label for="password" class="w3-text-blue">Nova Senha</label>
            <input type="password" name="password" id="password" class="w3-input w3-border" required>
        </div>
        <button type="submit" class="w3-button w3-green">Redefinir Senha</button>
    </form>
</section>
