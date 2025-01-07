<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $title ?></h1>
    <a href="/admin/portfolio/create" class="w3-button w3-green">Adicionar Item</a>
    <table class="w3-table w3-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($portfolioItems as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->title ?></td>
                    <td><?= $item->category ?></td>
                    <td>
                        <a href="/admin/portfolio/edit?id=<?= $item->id ?>" class="w3-button w3-light-blue">Editar</a>
                        <form action="/admin/portfolio/delete" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button type="submit" class="w3-button w3-red">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
