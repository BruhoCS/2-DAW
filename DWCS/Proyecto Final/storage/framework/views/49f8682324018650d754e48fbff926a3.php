<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Configura tu Entreno</h2>
            <a href="<?php echo e(route('entrenos')); ?>" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅ Volver a Entrenos</a>
            <form action="<?php echo e(route('entreno.update', $entreno->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!--ID del usuario-->
                <input hidden name="id_user" type="text" value="<?php echo e($entreno->id_user); ?>">
                <!-- Día de la Semana -->
                <div class="mb-3">
                    <label for="dia" class="form-label">Día de la Semana</label>
                    <select name="dia" id="escribirDia" class="form-select">
                        <option value="">Selecciona el día</option>
                        <option value="Lunes" <?php echo e(old('dia', $entreno->dia) == 'Lunes' ? 'selected' : ''); ?>>Lunes
                        </option>
                        <option value="Martes" <?php echo e(old('dia', $entreno->dia) == 'Martes' ? 'selected' : ''); ?>>Martes
                        </option>
                        <option value="Miercoles" <?php echo e(old('dia', $entreno->dia) == 'Miercoles' ? 'selected' : ''); ?>>
                            Miércoles</option>
                        <option value="Jueves" <?php echo e(old('dia', $entreno->dia) == 'Jueves' ? 'selected' : ''); ?>>Jueves
                        </option>
                        <option value="Viernes" <?php echo e(old('dia', $entreno->dia) == 'Viernes' ? 'selected' : ''); ?>>
                            Viernes</option>
                        <option value="Sabado" <?php echo e(old('dia', $entreno->dia) == 'Sabado' ? 'selected' : ''); ?>>Sábado
                        </option>
                        <option value="Domingo" <?php echo e(old('dia', $entreno->dia) == 'Domingo' ? 'selected' : ''); ?>>
                            Domingo</option>
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
                        <option value="Tren Superior"
                            <?php echo e(old('grupo_muscular', $entreno->grupo_muscular) == 'Tren Superior' ? 'selected' : ''); ?>>Tren
                            Superior</option>
                        <option value="Tren Inferior"
                            <?php echo e(old('grupo_muscular', $entreno->grupo_muscular) == 'Tren Inferior' ? 'selected' : ''); ?>>Tren
                            Inferior</option>
                        <option value="Core"
                            <?php echo e(old('grupo_muscular', $entreno->grupo_muscular) == 'Core' ? 'selected' : ''); ?>>Core</option>
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
                    <input name="ejercicio" type="text" class="form-control" id="ejercicio"
                        placeholder="Ejemplo: Sentadillas" value="<?php echo e(old('ejercicio', $entreno->ejercicio)); ?>">
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
                    <select name="repeticiones" id="repeticion" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="6" <?php echo e(old('repeticiones', $entreno->repeticiones) == '6' ? 'selected' : ''); ?>>6
                        </option>
                        <option value="8" <?php echo e(old('repeticiones', $entreno->repeticiones) == '8' ? 'selected' : ''); ?>>8
                        </option>
                        <option value="10" <?php echo e(old('repeticiones', $entreno->repeticiones) == '10' ? 'selected' : ''); ?>>
                            10</option>
                        <option value="12" <?php echo e(old('repeticiones', $entreno->repeticiones) == '12' ? 'selected' : ''); ?>>
                            12</option>
                        <option value="15" <?php echo e(old('repeticiones', $entreno->repeticiones) == '15' ? 'selected' : ''); ?>>
                            15</option>
                        <option value="20" <?php echo e(old('repeticiones', $entreno->repeticiones) == '20' ? 'selected' : ''); ?>>
                            20</option>
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
                        placeholder="Ejemplo: 45 minutos" value="<?php echo e(old('duracion', $entreno->duracion)); ?>">
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
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="">Selecciona el tipo</option>
                        <option value="Fuerza" <?php echo e(old('tipo', $entreno->tipo) == 'Fuerza' ? 'selected' : ''); ?>>Fuerza
                        </option>
                        <option value="Resistencia" <?php echo e(old('tipo', $entreno->tipo) == 'Resistencia' ? 'selected' : ''); ?>>
                            Resistencia</option>
                        <option value="Velocidad" <?php echo e(old('tipo', $entreno->tipo) == 'Velocidad' ? 'selected' : ''); ?>>
                            Velocidad</option>
                        <option value="Potencia" <?php echo e(old('tipo', $entreno->tipo) == 'Potencia' ? 'selected' : ''); ?>>Potencia
                        </option>
                        <option value="Cardiovascular"
                            <?php echo e(old('tipo', $entreno->tipo) == 'Cardiovascular' ? 'selected' : ''); ?>>Cardiovascular</option>
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
                    <select name="descanso" id="descanso" class="form-select">
                        <option value="">Selecciona</option>
                        <option value="1min" <?php echo e(old('descanso', $entreno->descanso) == '1min' ? 'selected' : ''); ?>>1 min
                        </option>
                        <option value="2min" <?php echo e(old('descanso', $entreno->descanso) == '2min' ? 'selected' : ''); ?>>2 min
                        </option>
                        <option value="3min" <?php echo e(old('descanso', $entreno->descanso) == '3min' ? 'selected' : ''); ?>>3 min
                        </option>
                        <option value="4min" <?php echo e(old('descanso', $entreno->descanso) == '4min' ? 'selected' : ''); ?>>4 min
                        </option>
                        <option value="5min" <?php echo e(old('descanso', $entreno->descanso) == '5min' ? 'selected' : ''); ?>>5 min
                        </option>
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

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/entreno.blade.php ENDPATH**/ ?>