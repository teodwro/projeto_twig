<?php

require_once('twig_carregar.php');
require('inc/banco.php');

echo $twig->render('login.html', [
    'titulo' => 'Login'
]);