<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$dados = $pdo->query('SELECT * FROM compromissos');

$comp = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $comp,
]);