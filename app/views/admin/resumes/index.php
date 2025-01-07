<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $title ?></h1>
    <a href="/admin/resumes/create" class="w3-button w3-green">Adicionar Currículo</a>
    <table class="w3-table w3-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Resumo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resumes as $resume): ?>
                <tr>
                    <td><?= $resume->id ?></td>
                    <td><?= $resume->user_id ?></td>
                    <td><?= $resume->summary ?></td>
                    <td>
                        <a href="/admin/resumes/edit?id=<?= $resume->id ?>" class="w3-button w3-light-blue">Editar</a>
                        <form action="/admin/resumes/delete" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $resume->id ?>">
                            <button type="submit" class="w3-button w3-red">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
