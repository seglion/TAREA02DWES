@extends('layouts.app')

@section('content')
use \Milon\Barcode\DNS1D;
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
                <img src="data:image/png;base64,<?= base64_encode(file_get_contents('generarBarcode.php?code=' . $jugador['barcode'])) ?>">
                <br>
                {{ $jugador['barcode'] }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="fcrear.php">Crear Nuevo Jugador</a>
@endsection