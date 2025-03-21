<?php $__env->startSection('contenido'); ?>
    <!-- Sección de deportes -->
    <section class="deportes mt-5">
        <div class="container">
            <div class="text-left mt-4">
                <a href="<?php echo e(route('inicio')); ?>" class="btn btn-secondary">Volver al Inicio</a>
            </div>
            <h2 class="text-center mb-4">Nuestros Deportes</h2>
            <!-- Botón de vuelta al inicio -->
            <div class="row">
                <!-- Jiu-Jitsu -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm p-3 rounded-3">
                        <h3 class="text-center">Jiu-Jitsu</h3>
                        <img src="<?php echo e(asset('media/img/ContenidoInicio/deportes/Actividades_jiu-jitsu.jpg')); ?>"
                            class="img-fluid rounded" alt="Imagen sobre Jiu-Jitsu">
                        <p>El Jiu-Jitsu es una disciplina de lucha que se centra en el control y sometimiento del oponente.
                        </p>
                        <a href="" class="btn btn-primary d-block text-center">Inscribirse</a>
                    </div>
                </div>

                <!-- Boxeo -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm p-3 rounded-3">
                        <h3 class="text-center">Boxeo</h3>
                        <img src="<?php echo e(asset('media/img/ContenidoInicio/deportes/Actividades_boxeo.jpg')); ?>"
                            class="img-fluid rounded" alt="Imagen sobre Boxeo">
                        <p>El Boxeo es un deporte de combate en el que se utilizan los puños para golpear al oponente.</p>
                        <a href="" class="btn btn-primary d-block text-center">Inscribirse</a>
                    </div>
                </div>

                <!-- MMA -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm p-3 rounded-3">
                        <h3 class="text-center">MMA</h3>
                        <img src="<?php echo e(asset('media/img/ContenidoInicio/deportes/Actividades_mma.jpg')); ?>"
                            class="img-fluid rounded" alt="Imagen sobre MMA">
                        <p>Las Artes Marciales Mixtas (MMA) combinan diversas técnicas de lucha y combate.</p>
                        <a href="" class="btn btn-primary d-block text-center">Inscribirse</a>
                    </div>
                </div>

                <!-- Powerlifting -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm p-3 rounded-3">
                        <h3 class="text-center">Powerlifting</h3>
                        <img src="<?php echo e(asset('media/img/ContenidoInicio/deportes/Actividades_powerlifting.jpg')); ?>"
                            class="img-fluid rounded" alt="Imagen sobre Powerlifting">
                        <p>El Powerlifting se centra en tres levantamientos principales: sentadilla, press de banca y peso
                            muerto.</p>
                        <a href="" class="btn btn-primary d-block text-center">Inscribirse</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/deportes.blade.php ENDPATH**/ ?>