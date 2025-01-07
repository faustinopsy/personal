<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-64">
    <h1 class="w3-center"><?= $title ?></h1>
    <div class="w3-row-padding">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="w3-third w3-margin-bottom">
                    <div class="w3-card-4">
                        <div class="w3-container w3-padding">
                            <?php if (isset($post->title)): ?>
                                <h5 class="w3-text-blue"><?= htmlspecialchars($post->title) ?></h5>
                                <p>
                                    <?= htmlspecialchars(mb_strimwidth(strip_tags($post->content ?? ''), 0, 100, '...')) ?>
                                </p>
                                <a href="/post/<?= $post->slug ?>" class="w3-button w3-blue w3-margin-top">Leia mais</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="w3-center">Nenhum item encontrado.</p>
        <?php endif; ?>
    </div>
</section>
