<?php
require '../vendor/autoload.php';
require '../src/Jugador.php';

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$posicion = $_POST['posicion'];
$dorsal = $_POST['dorsal'];
$barcode = $_POST['codigo_barras'];

// Validaciones básicas
if (empty($nombre) || empty($apellidos)) {
    die("Nombre y apellidos son obligatorios");
}

if (Jugador::dorsalExiste($dorsal)) {
    die("El dorsal ya existe");
}

if (Jugador::barcodeExiste($barcode)) {
    die("El código de barras ya existe");
}

// Insertar jugador
$resultado = Jugador::insertarJugador($nombre, $apellidos, $dorsal, $posicion, $barcode);
if (strpos($resultado, 'correctamente') !== false) {
    header("Location: jugadores.php");
} else {
    echo "Error: " . $resultado;
}