@extends('layouts.app')

@section('content')
<form action="crearJugador.php" method="POST">
    <div>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
    </div>
    <div>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
    </div>
    <div>
        <label>Dorsal:</label>
        <input type="number" name="dorsal" min="1" max="99" required>
    </div>
    <div>
        <label>Posición:</label>
        <select name="posicion" required>
            <option value="">Seleccionar</option>
            <option value="Portero">Portero</option>
            <option value="Defensa">Defensa</option>
            <option value="Lateral Izquierdo">Lateral Izquierdo</option>
            <option value="Lateral Derecho">Lateral Derecho</option>
            <option value="Central">Central</option>
            <option value="Delantero">Delantero</option>
        </select>
    </div>
    <div>
        <label>Código de barras:</label>
        <input type="text" name="codigo_barras" readonly>
        <button type="button" onclick="generarCodigo()">Generar Código</button>
    </div>
    <div>
        <button type="submit">Crear</button>
        <button type="reset">Limpiar</button>
        <a href="jugadores.php">Volver</a>
    </div>
</form>

<script>
function generarCodigo() {
    fetch('generarCode.php')
        .then(response => response.json())
        .then(data => {
            document.querySelector('input[name="codigo_barras"]').value = data.codigo;
        });
}
</script>
@endsection