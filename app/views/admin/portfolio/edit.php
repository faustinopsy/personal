<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/portfolio/update" method="POST" class="w3-container" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $portfolioItem->id ?>">
        <div class="mb-3">
            <label for="title" class="w3-text-blue">Título</label>
            <input type="text" name="title" id="title" class="w3-input w3-border" value="<?= $portfolioItem->title ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="w3-text-blue">Descrição</label>
            <textarea name="description" id="description" class="w3-input w3-border" required><?= $portfolioItem->description ?></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="w3-text-blue">Categoria</label>
            <input type="text" name="category" id="category" class="w3-input w3-border" value="<?= $portfolioItem->category ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="w3-text-blue">Imagem (deixe em branco para manter a atual)</label>
            <input type="file" name="image" id="image" class="w3-input w3-border" accept="image/*">
        </div>
        <button type="submit" class="w3-button w3-light-blue">Atualizar</button>
    </form>
</section>
