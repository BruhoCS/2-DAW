<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Crear un deporte</h2>

            <!-- Botón para volver -->
            <a href="<?php echo e(route('deportes')); ?>" class="btn btn-outline-primary btn-lg fw-bold mb-3">⬅ Volver a Deportes</a>

            <form action="<?php echo e(route('deporte.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>

               <!-- Nombre -->
               <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required
                    value="<?php echo e(old('nombre', $deportes->nombre)); ?>">
            </div>
            <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!--Entrenador --->
            <label for="id_entrenador">Entrenador: </label>
            <select name="id_entrenador" id="id_entrenador" class="form-select">
                <option value="">Selecciona un entrenador</option>
                <?php $__currentLoopData = $entrenadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrenador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($entrenador->id); ?>"
                        <?php echo e(old('entrenador', isset($deportes) ? $deportes->id_entrenador : '') == $entrenador->id ? 'selected' : ''); ?>>
                        <?php echo e($entrenador->nombre); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['entrenador'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!--Usuarios-->
            <div class="form-group">
                <label for="id_user">Usuarios</label>
                <div class="form-check">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check-inline">
                            <input type="checkbox" class="form-check-input" name="id_user[]" value="<?php echo e($user->id); ?>"
                                <?php if($deportes->usuarios->contains($user->id)): ?> checked <?php endif; ?>>
                            <label class="form-check-label" for="id_user"><?php echo e($user->name); ?></label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
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


            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio (€)</label>
                <input type="text" name="precio" class="form-control" required
                    value="<?php echo e(old('precio', $deportes->precio)); ?>">
            </div>
            <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!-- Día -->
            <div class="mb-3">
                <label for="dia" class="form-label">Día</label>
                <select name="dia" id="escribirDia" class="form-select">
                    <option value="">Selecciona el día</option>
                    <option value="Lunes" <?php echo e(old('dia', $deportes->dia) == 'Lunes' ? 'selected' : ''); ?>>Lunes
                    </option>
                    <option value="Martes" <?php echo e(old('dia', $deportes->dia) == 'Martes' ? 'selected' : ''); ?>>Martes
                    </option>
                    <option value="Miércoles" <?php echo e(old('dia', $deportes->dia) == 'Miércoles' ? 'selected' : ''); ?>>
                        Miércoles</option>
                    <option value="Jueves" <?php echo e(old('dia', $deportes->dia) == 'Jueves' ? 'selected' : ''); ?>>Jueves
                    </option>
                    <option value="Viernes" <?php echo e(old('dia', $deportes->dia) == 'Viernes' ? 'selected' : ''); ?>>
                        Viernes</option>
                    <option value="Sábado" <?php echo e(old('dia', $deportes->dia) == 'Sábado' ? 'selected' : ''); ?>>Sábado
                    </option>
                    <option value="Domingo" <?php echo e(old('dia', $deportes->dia) == 'Domingo' ? 'selected' : ''); ?>>
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

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required><?php echo e(old('descripcion', $deportes->descripcion)); ?></textarea>
            </div>
            <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!-- Nivel -->
            <div class="mb-3">
                <label for="nivel" class="form-label">Nivel</label>
                <select name="nivel" id="nivel" class="form-select" required>
                    <option value="">Selecciona</option>
                    <option value="Novato" <?php echo e(old('nivel', $deportes->nivel) == 'Novato' ? 'selected' : ''); ?>>Novato
                    </option>
                    <option value="Intermedio" <?php echo e(old('nivel', $deportes->nivel) == 'Intermedio' ? 'selected' : ''); ?>>
                        Intermedio</option>
                    <option value="Experto" <?php echo e(old('nivel', $deportes->nivel) == 'Experto' ? 'selected' : ''); ?>>Experto
                    </option>
                </select>
            </div>
            <?php $__errorArgs = ['nivel'];
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
                <label for="duracion" class="form-label">Duración (minutos)</label>
                <input type="number" name="duracion" class="form-control" required
                    value="<?php echo e(old('duracion', $deportes->duracion)); ?>">
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

            <!-- Botones -->
            <div class="d-flex gap-3 mt-4">
                <button type="submit" class="btn btn-primary w-100 fw-bold">📋 Enviar</button>
                <a href="<?php echo e(route('deportes')); ?>" class="btn btn-danger w-100 fw-bold">🗑️ Cancelar</a>
            </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/nuevoDeporte.blade.php ENDPATH**/ ?>