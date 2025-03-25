<?php

require('twig_carregar.php');
use Carbon\Carbon;

date_default_timezone_set('America/Sao_Paulo');

$data = Carbon::now();
$data_amanha = Carbon::now()->addDay(1);
$data_formatada = $data->format('d-m-y H:i:s');
$data_amanha_formatada = $data_amanha->format('d-m-y H:i:s');

echo $twig->render('horario.html', [
    'titulo' => 'Horario',
    'data' => $data_formatada,
    'amanha' => $data_amanha_formatada
]);
