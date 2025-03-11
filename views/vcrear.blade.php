@extends('layouts.app')

@section('content')
    <form action="creaJugador.php" method="POST">
        <div class="form-row">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>

            </div>

            <div class="form-group">
                <label>Apellidos:</label>
                <input type="text" name="apellidos" required>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Dorsal:</label>
                <input type="number" name="dorsal" min="1" max="99" required>
            </div>
            <div class="form-group">
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
            <div class="form-group">

                <label>Código de barras:</label>
                <input type="text" name="codigo_barras" readonly>
            </div>



        </div>
        <div class="btn-container">
            <button type="submit" class="button-primary">Crear</button>
            <button type="reset" class="button-secondary">Limpiar</button>
            <button type="button" class="button-volver" onclick="generarCodigo()"><i></i>Generar Código</button>
            <button type="button" class=" button-limpiar" onclick="window.location.href='jugadores.php'">Volver</button>
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
