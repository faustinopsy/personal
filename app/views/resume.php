<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-64">
    <h1 class="w3-center"><?= $title ?></h1>

    <div class="w3-card-4 w3-margin w3-white">
        <div class="w3-container w3-padding">
            <h2 class="w3-text-blue"><?= htmlspecialchars($resume->summary) ?></h2>
        </div>
    </div>

    <!-- Educação -->
    <h3>Educação</h3>
    <?php if (!empty($education)): ?>
        <?php foreach ($education as $edu): ?>
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container w3-padding">
                    <h5><b><?= htmlspecialchars($edu->degree) ?> - <?= htmlspecialchars($edu->institution) ?></b></h5>
                    <p><i><?= htmlspecialchars($edu->start_date) ?> a <?= htmlspecialchars($edu->end_date ?: 'Atual') ?></i></p>
                    <p><?= htmlspecialchars($edu->description) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma educação registrada.</p>
    <?php endif; ?>

    <!-- Experiências -->
    <h3>Experiências</h3>
    <?php if (!empty($experiences)): ?>
        <?php foreach ($experiences as $exp): ?>
            <div class="w3-card-4 w3-margin w3-white">
                <div class="w3-container w3-padding">
                    <h5><b><?= htmlspecialchars($exp->job_title) ?> - <?= htmlspecialchars($exp->company_name) ?></b></h5>
                    <p><i><?= htmlspecialchars($exp->start_date) ?> a <?= htmlspecialchars($exp->end_date ?: 'Atual') ?></i></p>
                    <p><?= htmlspecialchars($exp->description) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma experiência registrada.</p>
    <?php endif; ?>

    <!-- Tecnologias -->
    <h3>Tecnologias</h3>
    <?php if (!empty($technologies)): ?>
        <ul class="w3-ul">
            <?php foreach ($technologies as $tech): ?>
                <li><?= htmlspecialchars($tech->name) ?> (<?= htmlspecialchars($tech->proficiency_level) ?>)</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma tecnologia registrada.</p>
    <?php endif; ?>

    <!-- Habilidades -->
    <h3>Habilidades</h3>
    <?php if (!empty($skills)): ?>
        <ul class="w3-ul">
            <?php foreach ($skills as $skill): ?>
                <li><?= htmlspecialchars($skill->skill_name) ?> (<?= htmlspecialchars($skill->skill_type) ?>)</li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma habilidade registrada.</p>
    <?php endif; ?>

    <!-- Redes Sociais -->
    <h3>Redes Sociais</h3>
    <?php if (!empty($socials)): ?>
        <ul class="w3-ul">
            <?php foreach ($socials as $social): ?>
                <li><a href="<?= htmlspecialchars($social->url) ?>" target="_blank"><?= htmlspecialchars($social->platform) ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhuma rede social registrada.</p>
    <?php endif; ?>
</section>
