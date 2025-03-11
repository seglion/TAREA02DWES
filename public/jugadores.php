<?php
require '../vendor/autoload.php';
use Src\Jugador;
use Philo\Blade\Blade;


session_start();

$mensaje = null;
if (isset($_SESSION['success_message'])) {
    $mensaje = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Elimina el mensaje después de mostrarlo
}

$jugadores = Jugador::obtenerJugadores();
$blade = new Blade('../views', '../cache');
echo $blade->view()->make('vjugadores', ['jugadores' => $jugadores,'mensaje' => $mensaje])->render();