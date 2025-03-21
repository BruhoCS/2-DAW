<?php $__env->startSection('contenido'); ?>
<div class="container mt-5">
    <!-- Título con estilo -->
    <h1 class="text-center text-primary fw-bold">🏋️ Entreno Sugerido por la IA</h1>

    <!-- Botón de regreso -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-secondary fw-bold" href="<?php echo e(route('entrenos')); ?>">
            <i class="fas fa-arrow-left"></i> <?php echo e(__("idioma.Atras")); ?>

        </a>
    </div>

    <!-- Tarjeta con la respuesta de la IA -->
    <div class="card shadow-lg p-4">
        <h4 class="text-center text-success fw-bold mb-3">📋 Rutina Recomendada</h4>

        <div class="list-group">
            <!--Comprobamos que hay respuesta-->
            <?php if($respuestas !== null): ?>
                <?php $__currentLoopData = $respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $respuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-group-item list-group-item-action">
                        <?php echo e($respuesta); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--Si no la hay-->
            <?php else: ?>
            <!--Aviso de que no hay respuesta-->
                <div class="alert alert-warning text-center" role="alert">
                    No hay sugerencia disponible en este momento.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/chatEntreno.blade.php ENDPATH**/ ?>