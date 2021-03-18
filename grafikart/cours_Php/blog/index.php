<?php
require '../vendor/autoload.php';

//require_once '../class/Post.php';

$error = null;
$pdo = new PDO('sqlite:../database.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ

]);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$success = null;
try {
    if (isset($_POST['name'], $_POST['name'])) {
        $query = $pdo->prepare('INSERT INTO  posts (name, content, created_at) VALUES (:name, :content, :created)');
        $query->execute([

            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'created' => time()
        ]);
        $success = 'Votre article a été ajouté avec succés';
        header('Location: /blog/edit.php?id=' . $pdo->lastInsertId());
    }

    $query = $pdo->query('SELECT * FROM posts');
    $posts = $query->fetchAll(PDO::FETCH_CLASS, 'App\Post');
} catch (PDOException $e) {
    $error = $e->getMessage();
}


require '../elements/header.php'; ?>



<div class="container">
    <?php if ($error) : ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php else : ?>
       
            <?php foreach ($posts as $post) : ?>
                <h2><a href="/blog/edit.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a></h2>
                <p class="small text-muted">Ecrit le <?=$post->created_at->format('d/m/Y H:i') ?></p>
                <p>
                    <?= $post->getBody()?>
                </p>
            <?php endforeach ?>
        
<h2>Nouvel Article</h2>
        <form action="" method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="name" value="">

            </div>
            <div class="form-group">
                <textarea class="form-control" name="content"></textarea>

            </div>
            <button class="btn btn-primary mb-4">Sauvegarder</button>
        </form>
    <?php endif ?>
</div>








<?php require '../elements/footer.php'; ?>

