<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\Model\Post;
use App\ObjectHelper;
use App\Model\Category;
use App\Table\CategoryTable;
use App\Validators\categoryValidator;

Auth::check();

$errors = [];
$fields = ['name','slug'];
$item = new Category();

if (!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);
    $v = new categoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, $fields);

    if ($v->validate()) {
        $table->create([
            'name' => $item->getName(),
            'slug' => $item->getSlug()
        ]);
        header('Location: ' . $router->url('admin_categories') . '?created=1');
      exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($item, $errors);
?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        La catégorie n'a pas été enregistré, merci de corriger les erreurs!
    </div>
<?php endif ?>

<h1>Créer une nouvelle catégorie</h1>

<?php require('_form.php') ?>