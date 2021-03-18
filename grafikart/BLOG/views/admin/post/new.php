<?php

use App\Auth;
use App\HTML\Form;
use App\Connection;
use App\Model\Post;
use App\ObjectHelper;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Validators\PostValidator;
use App\Attachement\PostAttachement;

Auth::check();

$errors = [];
$post = new Post();
$pdo = Connection::getPDO();
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();
$post->setCreatedAt(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $postTable = new PostTable($pdo);
    $data = array_merge($_POST, $_FILES);
    $v = new PostValidator($data, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $data, ['name', 'content', 'slug', 'created_at', 'image']);

    if ($v->validate()) {
        $pdo->beginTransaction();
        PostAttachement::upload($post);
        $postTable->createPost($post);
        $postTable->attachCategorioes($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location: ' . $router->url('admin_posts') . '?created=1');
      exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($post, $errors);
?>


<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        L'article n'a pas été enregistré, merci de corriger les erreurs!
    </div>
<?php endif ?>

<h1>Créer un nouvel article</h1>

<?php require('_form.php') ?>