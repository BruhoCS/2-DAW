<?php $__env->startSection('contenido'); ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Configura tu Entreno</h2>
            <a href="<?php echo e(route('entrenos')); ?>" class="btn btn-outline-primary btn-lg fw-bold mt-3">⬅ Volver a Entrenos</a>
            <form [formGroup]="formulario" id="formulario">

                <!-- Día de la Semana -->
                <div class="mb-3">
                    <label for="escribirDia" class="form-label">Día de la Semana</label>
                    <select name="diaSemana" id="escribirDia" class="form-select" formControlName="dia">
                        <option value="">Selecciona el día</option>
                        <option value="lunes">Lunes</option>
                        <option value="martes">Martes</option>
                        <option value="miercoles">Miércoles</option>
                        <option value="jueves">Jueves</option>
                        <option value="viernes">Viernes</option>
                        <option value="sabado">Sábado</option>
                        <option value="domingo">Domingo</option>
                    </select>
                </div>

                <!-- Grupo Muscular -->
                <div class="mb-3">
                    <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
                    <select name="grupo_muscular" id="grupo_muscular" class="form-select" formControlName="grupo_muscular">
                        <option value="">Selecciona el grupo</option>
                        <option value="tren_superior">Tren Superior</option>
                        <option value="tren_inferior">Tren Inferior</option>
                        <option value="core">Core</option>
                    </select>
                </div>

                <!-- Ejercicio -->
                <div class="mb-3">
                    <label for="escribirEjercicios" class="form-label">Ejercicio</label>
                    <input type="text" class="form-control" id="escribirEjercicios" placeholder="Ejemplo: Sentadillas"
                        formControlName="ejercicio">
                </div>

                <!-- Repeticiones -->
                <div class="mb-3">
                    <label for="repeticiones" class="form-label">Repeticiones</label>
                    <select name="repeticiones" id="repeticiones" class="form-select" formControlName="repeticiones">
                        <option value="">Selecciona</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>

                <!-- Duración -->
                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración (min)</label>
                    <input type="text" class="form-control" id="duracion" placeholder="Ejemplo: 45 minutos"
                        formControlName="duracion">
                </div>

                <!-- Tipo de Entreno -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Entreno</label>
                    <select name="tipo" id="tipo" class="form-select" formControlName="tipo">
                        <option value="">Selecciona el tipo</option>
                        <option value="fuerza">Fuerza</option>
                        <option value="resistencia">Resistencia</option>
                        <option value="velocidad">Velocidad</option>
                        <option value="potencia">Potencia</option>
                        <option value="cardiovascular">Cardiovascular</option>
                    </select>
                </div>

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

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-primary w-100 me-2 fw-bold">📋 Enviar</button>
                    <a class="btn btn-danger w-100 fw-bold" href="<?php echo e(route('entrenos')); ?>">🗑️ Eliminar</a>
                </div>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/nuevoEntreno.blade.php ENDPATH**/ ?>