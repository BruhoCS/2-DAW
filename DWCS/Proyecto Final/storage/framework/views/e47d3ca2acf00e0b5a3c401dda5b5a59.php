<?php $__env->startSection('contenido'); ?>
    <!-- Contenido de tarifas -->
    <section class="container mt-5">
        <h2 class="text-center mb-4"><?php echo e(__("idioma.Nuestros Planes")); ?></h2>
        <div class="row justify-content-center">

            <!-- Plan Dain -->
            <div class="col-md-4">
                <div class="card shadow-lg p-3 text-center rounded-3">
                    <h3 class="fw-bold">Dain</h3>
                    <img class="card-img-top imagen-tarifa" src="<?php echo e(asset('media/img/imagenesTarifas/planDain.jpg')); ?>"
                        alt="Cuervo Dain" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    <div class="card-body">
                        <p class="fw-bold"><?php echo e(__("idioma.Acceso a")); ?>:</p>
                        <ul class="list-unstyled">
                            <li>✅ <?php echo e(__("idioma.Gimnasio")); ?></li>
                        </ul>
                        <p class="fw-bold"><?php echo e(__("idioma.Costes Adicionales a elegir")); ?>:</p>
                        <ul class="list-unstyled">
                            <li>💆‍♂️ <?php echo e(__("idioma.Sillones de masaje")); ?></li>
                        </ul>
                        <p class="display-6 fw-bold text-primary">25€</p>
                        <button class="btn btn-success btn-lg fw-bold"><?php echo e(__("idioma.Apuntarse")); ?></button>
                    </div>
                </div>
            </div>

            <!-- Plan Fenrir -->
            <div class="col-md-4">
                <div class="card shadow-lg p-3 text-center rounded-3">
                    <h3 class="fw-bold">Fenrir</h3>
                    <img class="card-img-top imagen-tarifa" src="<?php echo e(asset('media/img/imagenesTarifas/planFenrir.jpg')); ?>"
                        alt="Perro Fenrir" style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">
                    <div class="card-body">
                        <p class="fw-bold"><?php echo e(__("idioma.Acceso a")); ?>:</p>
                        <ul class="list-unstyled">
                            <li>✅ <?php echo e(__("idioma.Gimnasio")); ?></li>
                        </ul>
                        <p class="fw-bold"><?php echo e(__("idioma.Ventajas a elegir")); ?>:</p>
                        <ul class="list-unstyled">
                            <li>🏋️ <?php echo e(__("idioma.Deportes gratis")); ?> </li>
                        </ul>
                        <p class="display-6 fw-bold text-primary">35€</p>
                        <button class="btn btn-success btn-lg fw-bold"><?php echo e(__("idioma.Apuntarse")); ?></button>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/planes.blade.php ENDPATH**/ ?>