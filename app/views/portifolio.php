<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-8">
    <h1 class="w3-center"><?= $title ?></h1>
    <div class="w3-row-padding">
        <?php if (!empty($portfolio)): ?>
            <?php foreach ($portfolio as $post): ?>
                <div class="w3-third w3-margin-bottom">
                    <div class="w3-card-4">
                        <div class="w3-container w3-padding">
                            <?php if (isset($post->description)): ?>
                                <h5 class="w3-text-green"><?= htmlspecialchars($post->title) ?></h5>
                                <p>
                                    <?= htmlspecialchars(mb_strimwidth(strip_tags($post->description ?? ''), 0, 100, '...')) ?>
                                </p>
                                <?php if (!empty($post->image)): ?>
                                    <img src="<?= htmlspecialchars($post->image) ?>" alt="<?= htmlspecialchars($post->title) ?>" class="w3-image">
                                <?php endif; ?>
                                <a href="#" class="w3-button w3-green w3-margin-top">Ver Mais</a>
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
