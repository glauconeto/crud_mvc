<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core;

$template = file_get_contents('app/Template/estrutura.html');
ob_start();

$core = new Core;
$core->start($_GET);
$saida = ob_get_contents();

ob_end_clean();

$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);

echo $tplPronto;