<?php

require('inc/banco.php');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}


$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('DELETE FROM compromissos WHERE id = :id');
    $query->bindValue(':id', $id);
    $query->execute();
}

header('location:compromissos.php');