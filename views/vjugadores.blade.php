@extends('layouts.app')

@section('content')
@php


use Milon\Barcode\DNS1D;

$d = new DNS1D();
$d->setStorPath(__DIR__.'/cache/');

@endphp


@if (!empty($mensaje))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        {{ $mensaje }}
    </div>
@endif

<h1>Listado de Jugadores</h1>
<button class="button-secondary" onclick="window.location.href='fcrear.php'">Crear Jugador Nuevo</button>

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

@endsection