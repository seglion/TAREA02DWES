<?php
require '../vendor/autoload.php';
use Philo\Blade\Blade;

$blade = new Blade('../views', '../cache');
echo $blade->view()->make('vinstalacion')->render();