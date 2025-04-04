<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <!-- Botón para volver al inicio -->
        <div class="mb-4">
            <a class="btn btn-secondary fw-bold" href="<?php echo e(route('administracion')); ?>">
                <i class="fas fa-arrow-left"></i><?php echo e(__('idioma.Atras')); ?>

            </a>
        </div>

        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Entrenadores</h2>

            <a class="btn btn-primary btn-lg fw-bold mb-3" href="<?php echo e(route('entrenador.create')); ?>">
                <i class="fas fa-plus"></i> Añadir entrenador
            </a>

            <div id="entrenoPersona">
                <div id="nota">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th><?php echo e(__('idioma.Acciones')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $entrenadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrenador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($entrenador->nombre); ?></td>
                                        <td><?php echo e($entrenador->apellido); ?></td>
                                        <td><?php echo e($entrenador->email); ?></td>
                                        <td><?php echo e($entrenador->telefono); ?></td>
                                        <td><?php echo e($entrenador->direccion); ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="<?php echo e(route('entrenador.edit', $entrenador->id)); ?>"><?php echo e(__('idioma.Editar')); ?></a>
                                            <a class="btn btn-danger btn-sm"
                                                href="<?php echo e(route('entrenador.destroy', $entrenador->id)); ?>"><?php echo e(__('idioma.Borrar')); ?></a>
                                        </td>
                                    </tr>         
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/entrenadores.blade.php ENDPATH**/ ?>