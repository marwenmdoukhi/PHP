<?php
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}

require 'elements/header.php';


?>

<?php if ($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom) ?> Bienvenue !</h1>
<?php else: ?>
    <form action="" method="post">
        <div class="div form-group">
            <input type="" class="form-control" name="nom" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se Connecter</button>
    </form>
<?php endif; ?>




<?php require 'elements/footer.php'; ?>