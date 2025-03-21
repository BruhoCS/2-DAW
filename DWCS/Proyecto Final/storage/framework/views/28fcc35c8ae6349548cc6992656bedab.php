<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Configura tu Entreno</h2>
            <a href="<?php echo e(route('entrenos')); ?>" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅ Volver a Entrenos</a>
            <form action="<?php echo e(route('entreno.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <!--Guardaremos el usuario si es admin podrá cambiar el usuario al que le pertenece el entreno-->
                <?php if(auth()->user()->rol == 'admin'): ?>
                    <label for="id_user">Usuario: </label>
                    <select name="id_user" id="id_user" class="form-select">
                        <option value="">Selecciona un usuario</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($usuario->id); ?>">
                                <?php echo e($usuario->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <!--ID del usuario si no es admin no habrá la posibilidad de cambiar de usuario-->
                <?php else: ?>
                    <input hidden name="id_user" type="text" value="<?php echo e(auth()->user()->id); ?>">
                <?php endif; ?>
                <?php $__errorArgs = ['id_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <!-- Día de la Semana -->
                <div class="mb-3">
                    <label for="dia" class="form-label">Día de la Semana</label>
                    <select name="dia" id="dia" class="form-select">
                        <option value="">Selecciona el día</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                </div>
                <?php $__errorArgs = ['dia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <!-- Grupo Muscular -->
                <div class="mb-3">
                    <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
                    <select name="grupo_muscular" id="grupo_muscular" class="form-select">
                        <option value="">Selecciona el grupo</option>
                        <option value="Tren Superior">Tren Superior</option>
                        <option value="Tren Inferior">Tren Inferior</option>
                        <option value="Core">Core</option>
                    </select>
                </div>
                <?php $__errorArgs = ['grupo_muscular'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Ejercicio -->
                <div class="mb-3">
                    <label for="ejercicio" class="form-label">Ejercicio</label>
                    <input name="ejercicio" type="text" class="form-control" id="escribirEjercicios"
                        placeholder="Ejemplo: Sentadillas">
                </div>
                <?php $__errorArgs = ['ejercicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Repeticiones -->
                <div class="mb-3">
                    <label for="repeticiones" class="form-label">Repeticiones</label>
                    <select name="repeticiones" id="repeticiones" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <?php $__errorArgs = ['repeticiones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Duración -->
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (min)</label>
                    <input name="duracion" type="text" class="form-control" id="duracion"
                        placeholder="Ejemplo: 45 minutos" formControlName="duracion">
                </div>
                <?php $__errorArgs = ['duracion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Tipo de Entreno -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Entreno</label>
                    <select name="tipo" id="tipo" class="form-select" formControlName="tipo">
                        <option value="">Selecciona el tipo</option>
                        <option value="Fuerza">Fuerza</option>
                        <option value="Resistencia">Resistencia</option>
                        <option value="Velocidad">Velocidad</option>
                        <option value="Potencia">Potencia</option>
                        <option value="Cardiovascular">Cardiovascular</option>
                    </select>
                </div>
                <?php $__errorArgs = ['tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Descanso -->
                <div class="mb-3">
                    <label for="descanso" class="form-label">Descanso (min)</label>
                    <select name="descanso" id="descanso" class="form-select" formControlName="descanso">
                        <option value="">Selecciona</option>
                        <option value="uno">1 min</option>
                        <option value="dos">2 min</option>
                        <option value="tres">3 min</option>
                        <option value="cuatro">4 min</option>
                        <option value="cinco">5 min</option>
                    </select>
                </div>
                <?php $__errorArgs = ['descanso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary w-100 me-2 fw-bold">📋 Enviar</button>
                    <a class="btn btn-danger w-100 fw-bold" href="<?php echo e(route('entrenos')); ?>">🗑️ Eliminar</a>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/nuevoEntreno.blade.php ENDPATH**/ ?>