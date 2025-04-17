<?php

require('inc/banco.php');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}


$item = $_POST['item'] ?? null;

if ($item) {
    $query = $pdo->prepare('INSERT INTO compras (item) VALUES (:it)');

    $query->bindValue(':it', $item);

    $query->execute();
}

header('location:compras.php');