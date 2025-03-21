<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Edita tu perfil</h2>
            <a href="<?php echo e(route('perfil.show', $user->id)); ?>" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅
                Volver a Perfil</a>
            <form action="<?php echo e(route('perfil.update', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" id="name"
                        placeholder="Ejemplo: Sentadillas" value="<?php echo e(old('name', $user->name)); ?>">
                </div>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!--Apellido-->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input name="apellido" type="text" class="form-control" id="apellido"
                        value="<?php echo e(old('apellido', $perfil->apellido)); ?>">
                </div>
                <?php $__errorArgs = ['apellido'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!--Email-->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="email"
                        value="<?php echo e(old('email', $user->email)); ?>">
                </div>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!--Email-->
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="password"
                        value="<?php echo e(old('password', $user->password)); ?>">
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Plan -->
                <div class="mb-3">
                    <label for="id_plan" class="form-label">Plan</label>
                    <select name="id_plan" id="id_plan" class="form-select">
                        <option value="">Selecciona un plan</option>
                        <?php $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($plan->id); ?>"
                                <?php echo e(old('plan', isset($plan) ? $plan->id : '') == $plan->id ? 'selected' : ''); ?>>
                                <?php echo e($plan->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php $__errorArgs = ['id_plan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <!--Deporte-->
                <div class="form-group">
                    <label for="id_deporte">Deportes</label>
                    <div class="form-check">
                        <?php $__currentLoopData = $deportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input" name="id_deporte[]"
                                    value="<?php echo e($deporte->id); ?>" <?php if($user->deportes->contains($deporte->id)): ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="id_user"><?php echo e($deporte->nombre); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php $__errorArgs = ['id_deporte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!-- Rol -->
                <?php if(auth()->user()->rol == 'admin'): ?>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-select">
                            <option value="">Selecciona un rol</option>
                            <option value="admin" <?php echo e(old('rol', $user->rol) == 'admin' ? 'selected' : ''); ?>>Administrador
                            </option>
                            <option value="user" <?php echo e(old('rol', $user->rol) == 'user' ? 'selected' : ''); ?>>Usuario
                            </option>
                        </select>
                    </div>
                    <?php $__errorArgs = ['rol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php elseif(auth()->user()->rol == 'user'): ?>
                    <input type="text" name="rol" id="rol" class="form-select" value="<?php echo e(old('rol', $user->rol)); ?>">
                <?php endif; ?>


                <!--Teléfono-->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input name="telefono" type="text" class="form-control" id="telefono"
                        value="<?php echo e(old('telefono', $perfil->telefono)); ?>">
                </div>
                <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                <!--Dirección-->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direccion"
                        value="<?php echo e(old('direccion', $perfil->direccion)); ?>">
                </div>
                <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <!--Dirección-->
                <div class="mb-3">
                    <label for="hobby" class="form-label">Hobby</label>
                    <input name="hobby" type="text" class="form-control" id="hobby"
                        value="<?php echo e(old('hobby', $perfil->hobby)); ?>">
                </div>
                <?php $__errorArgs = ['hobby'];
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
                    <?php if(auth()->user()->rol == 'user'): ?>
                        <a class="btn btn-danger w-100 fw-bold" href="<?php echo e(route('perfil.show', $user->id)); ?>">🗑️
                            Eliminar</a>
                    <?php else: ?>
                        <a class="btn btn-danger w-100 fw-bold" href="<?php echo e(route('perfiles')); ?>">🗑️
                            Eliminar</a>
                    <?php endif; ?>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/nuevoPerfil.blade.php ENDPATH**/ ?>