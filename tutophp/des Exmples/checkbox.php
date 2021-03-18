<?php
//chekbock

$parfumes=[

    'bannane'=>7,
    'fraise'=>10,
    'chokola'=>15,
];
//radio
$corrnets=[
  'pot'=>2,
  'cornet'=>10

];
//checkbox
$suppliments=[
    'pipet de chochkola'=>2,
    'chantilly'=>0.5

];
require 'header.php';
?>
    <br><br>
    <br>
    <br>
    <pre>


    </pre>
    <form action="checkbox.php" method="get">
        <?php  foreach ($parfumes as $parfume =>$prix) : ?>

        <br>
        <!-- <input type="checkbox" name="parfumes[]" value="<?php echo $prix ?>">-->

        <?= checkbox('parfume',$parfume,$_GET) ?>
            <?=  $parfume ?>  - <?= $prix ?>dinnar
        <?php  endforeach;  ?>


        <?php  foreach ($corrnets as $corrnet =>$prix) : ?>

            <br>
            <!-- <input type="checkbox" name="parfumes[]" value="<?php echo $prix ?>">-->

            <?= radio('corrent',$corrnet,$_GET) ?>
            <?=  $corrnet ?>  - <?= $prix ?>dinnar
        <?php  endforeach;  ?>


        <button type="submit">composr la glace</button>
    </form>

<pre>
    <?php

    var_dump($_GET);

    ?>

</pre>
<?php require 'footer.php'; ?>