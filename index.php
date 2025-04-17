<?php

require_once('twig_carregar.php');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
]);