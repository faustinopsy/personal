<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-64">
    <div class="w3-card-4 w3-margin">
        <div class="w3-container">
            <h1><?= htmlspecialchars($post->title) ?></h1>
            <p><?= htmlspecialchars($post->slug) ?></p>
            <textarea id="content"><?= $post->content ?></textarea>
        </div>
    </div>
</section>

