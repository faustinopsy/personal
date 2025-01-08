<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-8">
    <h1 class="text-center"><?= $Lang::get('terms_conditions_title', 'Termos e Condições') ?></h1>
    <p>
        <?= $Lang::get(
            'terms_conditions_intro',
            'Estes termos e condições regem o uso deste site. Ao usar este site, você aceita integralmente estes termos.'
        ) ?>
    </p>
    <h2><?= $Lang::get('terms_conditions_use', 'Uso do Site') ?></h2>
    <p>
        <?= $Lang::get(
            'terms_conditions_usage',
            'Você concorda em usar este site apenas para fins legais e de maneira que não infrinja os direitos de terceiros.'
        ) ?>
    </p>
    <h2><?= $Lang::get('terms_conditions_products', 'Produtos e Serviços') ?></h2>
    <p>
        <?= $Lang::get(
            'terms_conditions_products_details',
            'Os produtos e serviços disponíveis neste site estão sujeitos a alterações sem aviso prévio.'
        ) ?>
    </p>
    <h2><?= $Lang::get('terms_conditions_liability', 'Limitação de Responsabilidade') ?></h2>
    <p>
        <?= $Lang::get(
            'terms_conditions_liability_details',
            'Não somos responsáveis por danos diretos ou indiretos resultantes do uso deste site.'
        ) ?>
    </p>
</section>
