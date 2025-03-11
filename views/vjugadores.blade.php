@extends('layouts.app')

@section('content')
@php
use Milon\Barcode\DNS1D;

$d = new DNS1D();
$d->setStorPath(__DIR__.'/cache/');

@endphp
<table border="1">
    <thead>
        <tr>
            <th>Nombre Completo</th>
            <th>Posición</th>
            <th>Dorsal</th>
            <th>Código de Barras</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jugadores as $jugador)
        <tr>
            <td>{{ $jugador['nombre'] }} {{ $jugador['apellidos'] }}</td>
            <td>{{ $jugador['posicion'] }}</td>
            <td>{{ $jugador['dorsal'] ?? 'Sin asignar' }}</td>
            <td>
                <!-- Carga el código de barras desde el script -->
                <img src="data:image/png;base64,{{$d->getBarcodePNG($jugador['barcode'], 'EAN13') }}" />
                <br>
                {{ $jugador['barcode'] }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="fcrear.php">Crear Nuevo Jugador</a>
@endsection