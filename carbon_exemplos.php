<?php

require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

echo Carbon::now()  . '<br>';
echo Carbon::now()->addDay() . '<br>';
echo Carbon::now()->subWeek()  . '<br>';
echo 'Proximas olimpíadas: ' . Carbon::createFromDate(2024)->addYears(4) . '<br>';

echo 'sua idade é: ' . Carbon::createFromDate(2007, 5, 17)->age . '<br>';

if (Carbon::now()->addDays(4)->isWeekend()) {
    echo "xesmanss" . '<br>';
} else {
    echo 'no hay'. '<br>';
}

echo "Eu nasci a " . Carbon::CreateFromDate(2007, 5, 17)->diff(Carbon::now()) . " atras";