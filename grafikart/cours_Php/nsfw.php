<?php
$age = null;
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}
if (!empty($_COOKIE['birthday'])) {
    $birthday = (int) $_COOKIE['birthday'];
    $age = date('Y') - $birthday;
}


require 'elements/header.php';
?>

<?php if ($age && $age >= 18) : ?>
    <div class="div alert alert-success">
        <h1>Vous avez le droit d'accéder aux contenus</h1>
    </div>
<?php elseif ($age !== null) : ?>
    <div class="div alert alert-danger">
        <h2>Désolé mais Vous n'avez pas le droit d'accéder aux contenus</h2>
    </div>

<?php else : ?>
    <form action="" method="post">
        <div class="div form-group">
            <label for="birthday">Veuillez choisir votre année de naissance et appuyez sur valider</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for ($i = 2010; $i > 1919; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
<?php endif; ?>







<?php require 'elements/footer.php'; ?>