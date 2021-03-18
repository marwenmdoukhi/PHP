<?php

use App\Attachement\PostAttachement;
use App\Auth;
use App\Connection;
use App\Table\PostTable;

Auth::check();

$pdo = Connection::getPDO();
$table= new PostTable($pdo);
$post = $table->find($params['id']);
PostAttachement::detach($post);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_posts') . '?delete=1');
?>


<h1>Suppression de l'article <?= $params['id'] ?></h1>