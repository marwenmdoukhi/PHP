<?php
$title="page d'acceuik";
require  'header.php';

session_start();
$_SESSION['role']='administrateur';



?>
<?php echo session_save_path();
?>

<main class="container">

    <div class="starter-template text-center py-5 px-3">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    </div>

    <?php require 'footer.php';?>
