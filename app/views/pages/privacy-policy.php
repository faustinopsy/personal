<?php $this->layout('template'); ?>

<section class="w3-container w3-padding-8">
    <h1 class="text-center"><?= $Lang::get('privacy_policy_title', 'Política de Privacidade') ?></h1>
    <p>
        <?= $Lang::get(
            'privacy_policy_content',
            'Sua privacidade é importante para nós. Esta política de privacidade descreve como coletamos, usamos e protegemos suas informações pessoais.'
        ) ?>
    </p>
    <h2><?= $Lang::get('privacy_policy_data_collection', 'Coleta de Dados') ?></h2>
    <p>
        <?= $Lang::get(
            'privacy_policy_data_details',
            'Coletamos informações pessoais como nome, email e endereço apenas quando necessário para fornecer nossos serviços.'
        ) ?>
    </p>
    <h2><?= $Lang::get('privacy_policy_data_use', 'Uso de Dados') ?></h2>
    <p>
        <?= $Lang::get(
            'privacy_policy_data_usage',
            'As informações coletadas são usadas para processar pedidos, personalizar sua experiência e melhorar nossos serviços.'
        ) ?>
    </p>
    <h2><?= $Lang::get('privacy_policy_security', 'Segurança') ?></h2>
    <p>
        <?= $Lang::get(
            'privacy_policy_security_details',
            'Implementamos medidas para proteger seus dados contra acessos não autorizados.'
        ) ?>
    </p>
</section>
