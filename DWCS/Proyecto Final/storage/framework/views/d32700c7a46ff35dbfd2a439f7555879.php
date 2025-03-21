<?php $__env->startSection('contenido'); ?>
    <!-- Sección de deportes -->
    <section class="deportes mt-5">
        <div class="container">
            <!-- Botón de vuelta al inicio -->
            <div class="text-left mt-4 mb-2">
                <a href="<?php echo e(route('inicio')); ?>" class="btn btn-secondary"><?php echo e(__("idioma.Atras")); ?></a>
            </div>
            <!-- Botón para añadir un nuevo deporte en caso de ser admin-->
            <?php if(auth()->user()->rol == 'admin'): ?>
                <a href="<?php echo e(route('deporte.create')); ?>" class="btn btn-primary "><?php echo e(__("idioma.Añadir Deporte")); ?></a>
            <?php endif; ?>
            <h2 class="text-center mb-4"><?php echo e(__("idioma.Nuestros Deportes")); ?></h2>

            <div class="row">
                <?php $__currentLoopData = $deportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- Contenedor del deporte -->
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm p-3 rounded-3">
                            <!--Nombre del deporte-->
                            <h3 class="text-center"><?php echo e($deporte->nombre); ?></h3>
                            <!--Nombre del entrenador-->
                            <p>Entrenador: <?php echo e($deporte->entrenador->nombre); ?></p>
                            <!--Nivel del deporte-->
                            <p>Nivel: <?php echo e($deporte->nivel); ?></p>
                            <!-- Dia de las clase -->
                            <p>Dia de clase: <?php echo e($deporte->dia); ?></p>
                            <!--Descripcion del deporte-->
                            <p><?php echo e($deporte->descripcion); ?></p>
                            <!--Botón del deporte-->
                            <a href="" class="btn btn-primary d-block text-center mb-2">Inscribirse</a>
                            <!--En caso de que sea admin tendra la opción de editar o borrar el deporte-->
                            <?php if(auth()->user()->rol == 'admin'): ?>
                                <a href="<?php echo e(route('deporte.edit', $deporte->id)); ?>"
                                    class="btn btn-warning d-block text-center mb-2"><?php echo e(__("idioma.Editar")); ?></a>
                                <a href="<?php echo e(route('deporte.destroy', $deporte->id)); ?>"
                                    class="btn btn-danger d-block text-center"><?php echo e(__("idioma.Borrar")); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/deportes.blade.php ENDPATH**/ ?>