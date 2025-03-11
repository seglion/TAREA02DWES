<?php $__env->startSection('content'); ?>
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
        <?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($jugador['nombre']); ?> <?php echo e($jugador['apellidos']); ?></td>
            <td><?php echo e($jugador['posicion']); ?></td>
            <td><?php echo e($jugador['dorsal'] ?? 'Sin asignar'); ?></td>
            <td>
                <!-- Carga el código de barras desde el script -->
                <img src="data:image/png;base64,<?= base64_encode(file_get_contents('generarBarcode.php?code=' . $jugador['barcode'])) ?>">
                <br>
                <?php echo e($jugador['barcode']); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<a href="fcrear.php">Crear Nuevo Jugador</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\TareaDECS2\views/vjugadores.blade.php ENDPATH**/ ?>