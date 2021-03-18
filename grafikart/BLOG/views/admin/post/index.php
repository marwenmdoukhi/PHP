<?php

use App\Auth;
use App\Connection;
use App\Table\PostTable;

Auth::check();

$router->layout = 'admin/layouts/default';
$title = "Gestion des Articles";
$pdo = Connection::getPDO();
$link = $router->url('admin_posts');
[$posts, $pagination] = (new PostTable($pdo))->findPaginated();

?>

<?php if (isset($_GET['delete'])) : ?>
    <div class="alert alert-success">
        L'article a été supprimé avec succés !!!
    </div>
<?php endif ?>

<?php if (isset($_GET['created'])) : ?>
    <div class="alert alert-success">
        Article créé avec succés !
    </div>
<?php endif ?>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Titre</th>
        <th>
            <a href="<?= $router->url('admin_post_new') ?>" class="btn btn-primary">Nouvel Article</a>
        </th>
    </thead>
    <tbody>
        <?php foreach ($posts as $post) : ?>
            <tr>
                <td>#<?= $post->getID() ?></td>
                <td>
                    <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>">
                        <?= e($post->getName()) ?>
                    </a>
                </td>
                <td>
                    <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>" class="btn btn-primary">
                        Editer
                    </a>
                    <form action="<?= $router->url('admin_post_delete', ['id' => $post->getID()]) ?>" method="post" onsubmit="return confirm('Voulez vous vraiment supprimer cet article ?')" style="display:inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link)  ?>
    <?= $pagination->nextLink($link) ?>
</div>