<?php
require '../vendor/autoload.php';
require '../src/Jugador.php';
use Faker\Factory;

$faker = Factory::create('es_ES');

// Valores del ENUM de la base de datos
$posiciones = [
    'Portero', 
    'Defensa', 
    'Lateral Izquierdo', 
    'Lateral Derecho', 
    'Central', 
    'Delantero'
];

for ($i = 0; $i < 10; $i++) { 
    $nombre = $faker->firstName();
    $apellidos = $faker->lastName();
    $posicion = $faker->randomElement($posiciones);
    $dorsal = $faker->unique()->numberBetween(1, 99);
    
    do {
        $codigo = generarEAN13();
    } while(Jugador::barcodeExiste($codigo));
    
    Jugador::insertarJugador($nombre, $apellidos, $dorsal, $posicion, $codigo);
}

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

header("Location: index.php");