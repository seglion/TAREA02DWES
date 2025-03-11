<?php
require '../vendor/autoload.php';
require '../src/Jugador.php';
use Philo\Blade\Blade;

$blade = new Blade('../views', '../cache');
echo $blade->view()->make('vcrear')->render();