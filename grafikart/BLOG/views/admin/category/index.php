<?php

use App\Auth;
use App\Connection;
use App\Table\CategoryTable;

Auth::check();

$router->layout = 'admin/layouts/default';
$title = "Gestion des catégories";
$pdo = Connection::getPDO();
$link = $router->url('admin_categories');
$items = (new CategoryTable($pdo))->all();

?>

<?php if (isset($_GET['delete'])) : ?>
    <div class="alert alert-success">
        La catégorie a été supprimée avec succés !!!
    </div>
<?php endif ?>

<?php if (isset($_GET['created'])) : ?>
    <div class="alert alert-success">
        La catégorie a été créée avec succés !
    </div>
<?php endif ?>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Titre</th>
        <th>URL</th>
        <th>
            <a href="<?= $router->url('admin_category_new') ?>" class="btn btn-primary">Nouvel Article</a>
        </th>
    </thead>
    <tbody>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td>#<?= $item->getID() ?></td>
                <td>
                    <a href="<?= $router->url('admin_category', ['id' => $item->getID()]) ?>">
                        <?= e($item->getName()) ?>
                    </a>
                </td>
                <td><?= $item->getSlug() ?></td>
                <td>
                    <a href="<?= $router->url('admin_category', ['id' => $item->getID()]) ?>" class="btn btn-primary">
                        Editer
                    </a>
                    <form action="<?= $router->url('admin_category_delete', ['id' => $item->getID()]) ?>" method="post" onsubmit="return confirm('Voulez vous vraiment supprimer cet article ?')" style="display:inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

