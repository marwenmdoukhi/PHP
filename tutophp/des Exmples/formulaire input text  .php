<?php
$adinver = 150;
$erreur = null;
$succes = null;
$value = null;


if (isset($_POST['chifre'])) {

    $value = (int)$_POST['chifre'];

    if ($value> $adinver) {
        $erreur = "votre chiffre est trop grand";
    } elseif ($value < $adinver) {
        $erreur = "votre chiffre est trop pettit";
    } else {
        $succes = "bravo  !!! '$adinver'";
    }

}
require 'header.php';
?>
    <br><br>
    <br>
    <br>
    <pre>

<?php if ($erreur) : ?>

    <div class="alert alert-danger">

    <?= $erreur ?>

</div>

<?php elseif ($succes) : ?>
    <div class="alert alert-success">
    <?= $succes ?>
</div>
<?php endif; ?>
    </pre>
    <form action="/formulaire%20input%20text%20%20.php" method="POST">

        <input type="number" name="chifre" placeholder="entre 0 et 1000"
               value="<?= $value ?>">

        <input type="text" name="demo" value="">



        <button type="submit">deviner</button>


    </form>

<?php require 'footer.php'; ?>