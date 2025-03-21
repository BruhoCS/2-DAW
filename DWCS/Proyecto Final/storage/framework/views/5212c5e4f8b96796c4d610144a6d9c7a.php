<?php $__env->startSection('contenido'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Cabecera con fondo degradado -->
                <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #007bff, #6610f2);">
                    <h3 class="fw-bold mb-0">Perfil de Usuario</h3>
                </div>
                <div class="card-body text-center p-5">
                    <!-- Información del usuario -->
                    <h4 class="fw-bold mb-1"><?php echo e($user->name); ?></h4>
                    <p class="text-muted mb-3"><?php echo e($perfil->apellido); ?></p>
                    <p class="text-muted mb-3"><?php echo e($user->email); ?></p>
                    <div class="d-flex justify-content-center flex-wrap">
                        <p class="me-3"><i class="fas fa-envelope text-primary"></i> <?php echo e($user->plan->nombre); ?></p>
                        <p class="me-3"><i class="fas fa-phone text-success"></i> <?php echo e($perfil->telefono); ?></p>
                        <p class="me-3"><i class="fas fa-map-marker-alt text-danger"></i> <?php echo e($perfil->direccion); ?></p>
                        <p><i class="fas fa-heart text-warning"></i> <?php echo e($perfil->hobby); ?></p>
                    </div>

                    <!-- Cuadro de deportes -->
                    <div class="card mt-4 border-info">
                        <div class="card-header text-center bg-info text-white">
                            <h5 class="mb-0">Deportes en los que participas</h5>
                        </div>
                        <div class="card-body">
                            <?php if($user->deportes->isEmpty()): ?>
                                <p class="text-muted">No estás inscrito en ningún deporte.</p>
                            <?php else: ?>
                                <ul class="list-group">
                                    <?php $__currentLoopData = $user->deportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="list-group-item"><?php echo e($deporte->nombre); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Botón para editar perfil -->
                    <a href="<?php echo e(route('perfil.edit', $user->id)); ?>" class="btn btn-warning mt-3 px-4">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/perfil.blade.php ENDPATH**/ ?>