<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/portfolio/store" method="POST" class="w3-container" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="w3-text-blue">Título</label>
            <input type="text" name="title" id="title" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="description" class="w3-text-blue">Descrição</label>
            <textarea name="description" id="description" class="w3-input w3-border" required></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="w3-text-blue">Categoria</label>
            <input type="text" name="category" id="category" class="w3-input w3-border">
        </div>
        <div class="mb-3">
            <label for="image" class="w3-text-blue">Imagem</label>
            <input type="file" name="image" id="image" class="w3-input w3-border" accept="image/*" required>
        </div>
        <button type="submit" class="w3-button w3-teal">Salvar</button>
    </form>
</section>
