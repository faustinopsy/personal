<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $title ?></h1>
    <a href="/admin/users/create" class="btn btn-success mb-3">Adicionar Usuário</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->firstName ?> <?= $user->lastName ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <a href="/admin/users/edit?id=<?= $user->id ?>" class="btn btn-primary btn-sm">Editar</a>
                        <form action="/admin/users/delete" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
