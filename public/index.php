<?php
require '../vendor/autoload.php';
use Src\Jugador;

if (count(Jugador::obtenerJugadores()) == 0) {
    header("Location: instalacion.php");
} else {
    header("Location: jugadores.php");
}