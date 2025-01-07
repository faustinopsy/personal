<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/blog-posts/store" method="POST" class="w3-container" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="w3-text-blue">Título</label>
            <input type="text" name="title" id="title" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="w3-text-blue">Slug</label>
            <input type="text" name="slug" id="slug" class="w3-input w3-border" required>
        </div>
        <div class="mb-3">
            <label for="content" class="w3-text-blue">Conteúdo</label>
            <textarea type="text" name="content" id="content" class="w3-input w3-border"></textarea>
        </div>
        <button type="submit" class="w3-button w3-teal">Salvar</button>
    </form>
</section>
