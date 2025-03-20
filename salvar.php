<?php

require('inc/banco.php');

$item = $_POST['item'] ?? null;
$item_id = $_POST['id'] ?? null ;

if ($item) {
    $query = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');

    $query->bindValue(':item', $item);
    $query->bindValue(':id', $id);

    $query->execute();
}

header('location:compras.php');