<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-8">
    <h1 class="w3-center"><?= $title ?></h1>
    <div class="w3-row-padding">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="w3-card-4 w3-margin">
                    <div class="w3-container">
                        <h2><?= htmlspecialchars($post->title) ?></h2>
                        <p><?= htmlspecialchars($post->slug) ?></p>
                        <a href="/blog/<?= $post->id ?>" class="w3-button w3-blue">Leia Mais</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="w3-center">Nenhum item encontrado.</p>
        <?php endif; ?>
    </div>
</section>
