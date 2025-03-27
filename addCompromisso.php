<?php

require_once('twig_carregar.php');
require('inc/banco.php');
use Carbon\Carbon;

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['data'] ?? null;

if ($titulo && $data) {
    try {
        $dataCarbon = Carbon::parse($data);
        $dataFormatada = $dataCarbon->format('Y-m-d H:i:s'); 

        $query = $pdo->prepare('INSERT INTO compromissos (titulo, data) VALUES (:titulo, :data)');

        $query->bindValue(':titulo', $titulo);
        $query->bindValue(':data', $dataFormatada);

        if ($query->execute()) {
            header('Location: compromissos.php');
            exit;
        } else {
            echo 'Erro ao inserir o compromisso. Tente novamente.';
        }
    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }
} else {
    echo 'Título ou Data não foram informados.';
}
