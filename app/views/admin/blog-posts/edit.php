<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/blog-posts/update" method="POST" class="w3-container">
        <input type="hidden" name="id" value="<?= $post->id ?>">
        <div class="mb-3">
            <label for="title" class="w3-text-blue">Título</label>
            <input type="text" name="title" id="title" class="w3-input w3-border" value="<?= $post->title ?>" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="w3-text-blue">Slug</label>
            <input type="text" name="slug" id="slug" class="w3-input w3-border" value="<?= $post->slug ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="w3-text-blue">Conteúdo</label>
            <textarea name="content" id="content" class="w3-input w3-border" rows="6" required><?= $post->content ?></textarea>
        </div>
        <button type="submit" class="w3-button w3-light-blue">Atualizar</button>
    </form>
</section>
<script>
    if (document.getElementById("content")) {
    new SimpleMDE({
        element: document.getElementById("content"),
        spellChecker: false,
        autosave: {
            enabled: true,
            unique_id: "content",
        },
        toolbar: [
            "bold", "italic", "quote", "unordered-list", "ordered-list", 
            "link", "image", "table", "horizontal-rule", "guide" ,"preview"
        ]
    });
}

</script>