<?php

require('inc/banco.php');

$usuario = $_POST['usuario'] ?? null; 
$senha = $_POST['senha'] ?? null;

if ($usuario && $senha) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $query = $pdo->prepare('INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)');
    $query->bindValue(':usuario', $usuario);
    $query->bindValue(':senha', $senhaHash);

    $query->execute();
}

header('location:login.php');