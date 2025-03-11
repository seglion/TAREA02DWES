<?php
require '../vendor/autoload.php';
require '../src/Jugador.php';

if (count(Jugador::obtenerJugadores()) == 0) {
    header("Location: instalacion.php");
} else {
    header("Location: jugadores.php");
}