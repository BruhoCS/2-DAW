<?php $__env->startSection('contenido'); ?>
    <div id="load" style="table table-bordered">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="col">Nombre</th>
                    <th class="col">Apellido</th>
                    <th class="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $entrenadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrenador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($entrenador->nombre); ?></td>
                        <td><?php echo e($entrenador->apellido); ?></td>
                        <td><?php echo e($entrenador->email); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($entrenadores->onEachSide(1)->links('vendor.pagination.bootstrap-4')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/cargarEntrenadores.blade.php ENDPATH**/ ?>