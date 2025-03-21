<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <!-- Botón para volver al inicio debajo de la cabecera -->
        <div class="d-flex justify-content-between mb-4">
            <a class="btn btn-secondary fw-bold" href="<?php echo e(route('inicio')); ?>">
                <i class="fas fa-arrow-left"></i> <?php echo e(__("idioma.Atras")); ?>

            </a>
            <a class="btn btn-info fw-bold" href="chatEntreno">
                <i class="fas fa-comments"></i> Presiona para una sugerencia hecha por IA
            </a>
        </div>
        
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4"><?php echo e(__("idioma.Entreno Manual")); ?></h2>

            <a class="btn btn-primary btn-lg fw-bold mb-3" href="<?php echo e(route('entreno.create')); ?>">
                <i class="fas fa-plus"></i> <?php echo e(__("idioma.Añadir Entreno")); ?>

            </a>

            <div id="entrenoPersona">
                <div id="nota">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th><?php echo e(__("idioma.Día")); ?></th>
                                <th><?php echo e(__("idioma.Grupo Muscular")); ?></th>
                                <th><?php echo e(__("idioma.Ejercicio")); ?></th>
                                <th><?php echo e(__("idioma.Repeticiones")); ?></th>
                                <th><?php echo e(__("idioma.Duración")); ?></th>
                                <th><?php echo e(__("Tipo")); ?></th>
                                <th><?php echo e(__("idioma.Descanso")); ?></th>
                                <th><?php echo e(__("idioma.Usuario")); ?></th>
                                <th><?php echo e(__("idioma.Acciones")); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $entrenos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entreno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($entreno->dia); ?></td>
                                    <td><?php echo e($entreno->grupo_muscular); ?></td>
                                    <td><?php echo e($entreno->ejercicio); ?></td>
                                    <td><?php echo e($entreno->repeticiones); ?></td>
                                    <td><?php echo e($entreno->duracion); ?></td>
                                    <td><?php echo e($entreno->tipo); ?></td>
                                    <td><?php echo e($entreno->descanso); ?></td>
                                    <td><?php echo e($entreno->usuario->name); ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="<?php echo e(route('entreno.edit', $entreno->id)); ?>"><?php echo e(__("idioma.Editar")); ?></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo e(route('entreno.destroy', $entreno->id)); ?>"><?php echo e(__("idioma.Borrar")); ?></a>
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

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/entrenos.blade.php ENDPATH**/ ?>