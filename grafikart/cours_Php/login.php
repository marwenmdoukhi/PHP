<?php
$erreur = null;
$password = '$2y$12$vuMdZs4Ys.dBcOYkb.vbOu/0YU.609tlZlZkFPUFde.rryj7UBDnS';
if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
    if ($_POST['pseudo'] === 'Ndiack' && password_verify($_POST['motdepasse'], $password)){
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashbord.php');
    } else {
        $erreur = 'Identifiants incorrects';
    }
}

require_once 'functions/auth.php';
if(est_connecte()){
    header('Location: /dashbord.php');
    exit();
}
require_once 'elements/header.php';
?>
<?php if ($erreur) : ?>
    <div class="div alert alert-danger">
        <?= $erreur ?>
    </div>
<?php endif ?>

<form action="" method="POST">
    <div class="div form-group">
        <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="div form-group">
        <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Se Connecter</button>
</form>






<?php require 'elements/footer.php'; ?>