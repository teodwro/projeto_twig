<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$usuario = $_POST['usuario'] ?? null;
$senha = $_POST['senha'] ?? null;

if ($usuario && $senha) {

    $query = $pdo->prepare('SELECT id, usuario, senha FROM usuarios WHERE usuario = :usuario LIMIT 1');
    $query->bindValue(':usuario', $usuario);
    $query->execute();

    $usuarioBanco = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuarioBanco) {
        if (password_verify($senha, $usuarioBanco['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuarioBanco['id'];
            $_SESSION['usuario'] = $usuarioBanco['usuario'];

            header('location: index.php');
            exit;
        } else {
            echo "Senha inválida!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
} else {
    echo "Por favor, preencha todos os campos!";
}