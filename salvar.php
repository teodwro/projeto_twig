<?php

require('inc/banco.php');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}


$item = $_POST['item'] ?? null;
$id = $_POST['id'] ?? null ;

if ($item) {
    $query = $pdo->prepare('UPDATE compras SET item = :item WHERE id = :id');

    $query->bindValue(':item', $item);
    $query->bindValue(':id', $id);

    $query->execute();
}

header('location:compras.php');