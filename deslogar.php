<?php

require_once('twig_carregar.php');
require('inc/banco.php');   

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}


session_destroy();

echo $twig->render('login.html');