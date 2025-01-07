<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-64">
    <h1 class="w3-center"><?= $title ?></h1>

    <div class="w3-card-4 w3-margin w3-white">
        <div class="w3-container w3-padding">
            <p class="w3-text-black"><?= htmlspecialchars($resume->summary) ?></p>
       

    <?php if (!empty($education)): ?>
        <h3 class="w3-center">Educação</h3><hr>
        <?php foreach ($education as $edu): ?>
                    <h5><b><?= htmlspecialchars($edu->degree) ?> - <?= htmlspecialchars($edu->institution) ?></b></h5>
                    <p><i><?= htmlspecialchars($edu->start_date) ?> a <?= htmlspecialchars($edu->end_date ?: 'Atual') ?></i></p>
                    <p><?= htmlspecialchars($edu->description) ?></p>
        <?php endforeach; ?>
        <hr>
    <?php else: ?>
        <p>Nenhuma educação registrada.</p>
    <?php endif; ?>

    
    <?php if (!empty($experiences)): ?>
        <h3 class="w3-center">Experiências</h3><hr>
        <?php foreach ($experiences as $exp): ?>
                    <h5><b><?= htmlspecialchars($exp->job_title) ?> - <?= htmlspecialchars($exp->company_name) ?></b></h5>
                    <p><i><?= htmlspecialchars($exp->start_date) ?> a <?= htmlspecialchars($exp->end_date ?: 'Atual') ?></i></p>
                    <p><?= htmlspecialchars($exp->description) ?></p>
        <?php endforeach; ?>
        <hr>
    <?php else: ?>
        <p>Nenhuma experiência registrada.</p>
    <?php endif; ?>

   
    <?php if (!empty($technologies)): ?>
        <h3 class="w3-center">Tecnologias</h3><hr>
            <?php foreach ($technologies as $tech): ?>
                <p><?= htmlspecialchars($tech->name) ?> (<?= htmlspecialchars($tech->proficiency_level) ?>)</p>
            <?php endforeach; ?>
            <hr>
    <?php else: ?>
        <p>Nenhuma tecnologia registrada.</p>
    <?php endif; ?>

    
    <?php if (!empty($skills)): ?>
        <h3 class="w3-center">Habilidades</h3><hr>
            <?php foreach ($skills as $skill): ?>
                <p><?= htmlspecialchars($skill->skill_name) ?> (<?= htmlspecialchars($skill->skill_type) ?>)</p>
            <?php endforeach; ?>
            <hr>
    <?php else: ?>
        <p>Nenhuma habilidade registrada.</p>
    <?php endif; ?>

    
    
    <?php if (!empty($socials)): ?>
        <h3 class="w3-center">Redes Sociais</h3><hr>
            <?php foreach ($socials as $social): ?>
                <p><a href="<?= htmlspecialchars($social->url) ?>" target="_blank"><?= htmlspecialchars($social->platform) ?></a></p>
            <?php endforeach; ?>
            <hr>
    <?php else: ?>
        <p>Nenhuma rede social registrada.</p>
    <?php endif; ?>
       </div>
     </div>
</section>
