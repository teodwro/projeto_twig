<?php

require('inc/banco.php');

$item_id =  $_GET['id'] ?? null;

if ($item_id) {
    $query = $pdo->prepare('DELETE FROM compras WHERE id = :id');
    $query->bindValue(':id', $item_id);
    $query->execute();
}

header('location:compras.php');