<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$item_id = $_GET['id'];

$query = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
$query->bindValue(':id', $item_id);
$query->execute();

$item = $query->fetch(PDO::FETCH_ASSOC);

echo $twig->render('editar.html', [
    'item' => $item,
    'titulo' => 'Editar Item'
]);