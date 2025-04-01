<?php

require_once('twig_carregar.php');
require('inc/banco.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $query = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
    $query->bindValue(':id', $id);
    $query->execute();

    $compromisso = $query->fetch(PDO::FETCH_ASSOC);

    echo $twig->render('editar_compromisso.html', [
        'compromisso' => $compromisso,
        'titulo' => 'Editar Compromisso'
    ]);
} else {

    $id = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'] ?? null;
    $data = $_POST['data'] ?? null;

    if ($id) {
        $query = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, data = :newdata WHERE id = :id');

        $query->bindValue(':id', $id);
        $query->bindValue(':titulo', $titulo);
        $query->bindValue(':newdata', $data);

        $query->execute();
    }

    header('location:compromissos.php');
}
