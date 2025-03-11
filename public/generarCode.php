<?php
require '../vendor/autoload.php';
require '../src/Jugador.php';

function generarEAN13() {
    $codigo = '';
    while(strlen($codigo) < 12) {
        $codigo .= mt_rand(0,9);
    }
    
    $sum = 0;
    for ($i = 0; $i < 12; $i++) {
        $sum += ($i % 2 == 0) ? (int)$codigo[$i] : (int)$codigo[$i] * 3;
    }
    $checksum = (10 - ($sum % 10)) % 10;
    return $codigo . $checksum;
}

$codigo = generarEAN13();
while(Jugador::barcodeExiste($codigo)) {
    $codigo = generarEAN13();
}

echo json_encode(['codigo' => $codigo]);