<?php $this->layout('template'); ?>

<section class="container mt-5">
    <h1 class="text-center"><?= $title ?></h1>
    <a href="/admin/blog-posts/create" class="w3-button w3-green">Adicionar Blog Post</a>
    <table class="w3-table w3-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Slug</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post->id ?></td>
                    <td><?= $post->title ?></td>
                    <td><?= $post->slug ?></td>
                    <td>
                        <a href="/admin/blog-posts/edit?id=<?= $post->id ?>" class="w3-button w3-light-blue">Editar</a>
                        <form action="/admin/blog-posts/delete" method="POST" style="display:inline-block;">
                            <input type="hidden" name="id" value="<?= $post->id ?>">
                            <button type="submit" class="w3-button w3-red">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
