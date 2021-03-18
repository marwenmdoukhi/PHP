</main><!-- /.container -->

<?php

require_once 'Class/DoubleCompteur.php';
$comtpeur=new DoubleCompteur((__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur');
$comtpeur->incremente();
$vue=$comtpeur->recepuerer();
var_dump($vue);
?>

<?=  $vue ?> visite


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>
</html>
