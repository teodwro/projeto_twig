<?php

require('twig_carregar.php');
use Carbon\Carbon;

date_default_timezone_set('America/Sao_Paulo');

$data = Carbon::now();
$data_amanha = Carbon::now()->addDay(1);
$data_formatada = $data->format()

echo $twig->render('horario.html', [
    'titulo' => 'Horario',
    'data' => $data,
    'amanha' => $data_amanha
]);
