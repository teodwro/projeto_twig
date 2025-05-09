<?php

require_once('twig_carregar.php');
require('inc/banco.php');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}


$ordem = $_POST['ordem'] ?? null; 

if ($ordem == 'proximo') {
    $dados = $pdo->query('SELECT * FROM compromissos ORDER BY ABS(DATEDIFF(data, CURDATE())) ASC');
} else {
    $dados = $pdo->query('SELECT * FROM compromissos');
} 

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
]);