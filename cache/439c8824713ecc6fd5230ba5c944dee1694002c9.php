<?php $__env->startSection('content'); ?>
<?php


use Milon\Barcode\DNS1D;

$d = new DNS1D();
$d->setStorPath(__DIR__.'/cache/');

?>


<?php if(!empty($mensaje)): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        <?php echo e($mensaje); ?>

    </div>
<?php endif; ?>

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
        <?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jugador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($jugador['nombre']); ?> <?php echo e($jugador['apellidos']); ?></td>
            <td><?php echo e($jugador['posicion']); ?></td>
            <td><?php echo e($jugador['dorsal'] ?? 'Sin asignar'); ?></td>
            <td>
                <!-- Carga el código de barras desde el script -->
                <img src="data:image/png;base64,<?php echo e($d->getBarcodePNG($jugador['barcode'], 'EAN13')); ?>" />
                <br>
                <?php echo e($jugador['barcode']); ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\TareaDECS2\views/vjugadores.blade.php ENDPATH**/ ?>