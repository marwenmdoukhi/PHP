<?php

$pdo = new PDO('sqlite:../database.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ

]);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$error = null;
$success = null;

$id = $pdo->quote($_GET['id']);
try {
    if (isset($_POST['name'], $_POST['name'])) {
        $query = $pdo->prepare('UPDATE  posts SET name = :name, content = :content WHERE id = :id');
        $query->execute([
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'content' => $_POST['content']
        ]);
        $success = 'Votre article a été modifié avec succés';
    }
    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    $post = $query->fetch();
} catch (PDOException $e) {
    $error = $e->getMessage();
}


require '../elements/header.php'; ?>




<div class="container">
    <?php if ($success) : ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif ?>
    <?php if ($error) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php else : ?>
        <form action="" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="name" value="<?= htmlentities($post->name) ?>">

            </div>
            <div class="form-group">
                <textarea class="form-control" name="content"><?= htmlentities($post->content) ?></textarea>

            </div>
            <button class="btn btn-primary mb-4">Sauvegarder</button>
        </form>
    <?php endif ?>

    <p>
        <a href="/blog">Retour à la liste des articles</a>
    </p>
</div>









<?php require '../elements/footer.php'; ?>