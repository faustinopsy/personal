<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $title ?></h1>
    <a href="/admin/users/create" class="w3-button w3-green"><?= $Lang::get('add_user', 'Adicionar Usuário') ?></a>
    <table class="w3-table w3-striped">
        <thead>
            <tr>
                <th><?= $Lang::get('id', 'ID') ?></th>
                <th><?= $Lang::get('name', 'Nome') ?></th>
                <th><?= $Lang::get('email', 'Email') ?></th>
                <th><?= $Lang::get('actions', 'Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->firstName ?> <?= $user->lastName ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <a href="/admin/users/edit?id=<?= $user->id ?>" class="w3-button w3-light-blue"><?= $Lang::get('edit', 'Editar') ?></a>
                        <form action="/admin/users/delete" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <button type="submit" class="w3-button w3-red"><?= $Lang::get('delete', 'Excluir') ?></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
