<?php
require 'header.php';
if(!empty($_POST['birthday'])){

    setcookie('birthday',$_POST['birthday']);
}

$age=null;
if(!empty($_POST['birthday'])) {
$birthday=(int)$_COOKIE['birthday'];
$age=(int)date('y')-$birthday;
}

?>
<br> <br> <br> <br> <br> <br> <br>

<?php if ($age>18) : ?>
<form action="" method="POST">
    <select name="birthday"  id="birthday">
        <?php  for ($i=2010; $i>1919; $i --) : ?>
            <option  value="<?= $i ?>">
                <?= $i?>
            </option>
        <?php endfor; ?>

    </select>

<button type="submit">vérifier</button>
</form>
