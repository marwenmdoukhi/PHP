<?php

$pdo = new PDO('sqlite:../database.db', null, null, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ

]);
//$pdo->beginTransaction();
//$pdo->query('DELETE FROM posts LIMIT 1');
//$pdo->query('DELETE FROM posts LIMIT 1');
//$pdo->commit();