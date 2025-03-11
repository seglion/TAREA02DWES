<?php
require '../vendor/autoload.php';
require '../src/Jugador.php';
use Philo\Blade\Blade;

$jugadores = Jugador::obtenerJugadores();
$blade = new Blade('../views', '../cache');
echo $blade->view()->make('vjugadores', ['jugadores' => $jugadores])->render();