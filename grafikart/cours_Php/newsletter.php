<?php
$error = null;
$success = null;
$email = null;
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = null;
    } else {
        $error = "Email invalide";
    }
}

require 'elements/header.php';
?>


<h1>S'inscrire à la newsletter</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque voluptas ducimus saepe,
    mollitia ex fugit sit exercitationem vero quis eius ullam dolor molestiae,
    neque nemo beatae itaque illum impedit asperiores.
</p>
<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif; ?>


<form action="/newsletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrez votre email" required class="form-control" value="<?= htmlentities($email) ?>">
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>



<?php require 'elements/footer.php'; ?>