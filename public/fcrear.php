<?php
require '../vendor/autoload.php';
use Src\Jugador;
use Philo\Blade\Blade;

$blade = new Blade('../views', '../cache');
echo $blade->view()->make('vcrear')->render();