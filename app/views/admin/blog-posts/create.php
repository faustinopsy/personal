<?php $this->layout('template'); ?>

<section class="w3-container">
    <h1 class="text-center"><?= $title ?></h1>
    <form action="/admin/blog-posts/store" method="POST" class="w3-container" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="w3-text-blue">Título</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="w3-input w3-border" 
                value="<?= isset($titleInput) ? htmlspecialchars($titleInput) : '' ?>" 
                required
            >
        </div>
        <div class="mb-3">
            <label for="slug" class="w3-text-blue">Slug (Descrição Breve)</label>
            <input
                type="text"
                name="slug"
                id="slug"
                class="w3-input w3-border"
                value="<?= isset($slugInput) ? htmlspecialchars($slugInput) : '' ?>" 
                required
            >
        </div>
        <button
            type="button"
            class="w3-button w3-blue"
            id="generate-content-btn"
        >
            Gerar Conteúdo Automático
        </button>

        <div class="mb-3">
            <label for="content" class="w3-text-blue">Conteúdo</label>
            <textarea
                name="content"
                id="content"
                class="w3-input w3-border"
                rows="10"
            ><?= isset($generatedContent) ? htmlspecialchars($generatedContent) : '' ?></textarea>
        </div>
        <button type="submit" class="w3-button w3-teal">Salvar Postagem</button>
    </form>
</section>

<script>
    

    document.getElementById('generate-content-btn').addEventListener('click', () => {
        const title = document.getElementById('title').value;
        const slug = document.getElementById('slug').value;

        if (!title || !slug) {
            alert('Por favor, preencha o título e o slug antes de gerar o conteúdo.');
            return;
        }

        fetch('/admin/blog-posts/generate-content', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ title, slug }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.content) {
                markdown.value(data.content);
                alert('Conteúdo gerado com sucesso!');
            } else {
                alert('Erro ao gerar conteúdo.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao gerar conteúdo.');
        });
    });

  document.querySelector('form').addEventListener('submit', (e) => {
        const contentTextarea = document.getElementById('content');
        contentTextarea.value = markdown.value();
    });
</script>
