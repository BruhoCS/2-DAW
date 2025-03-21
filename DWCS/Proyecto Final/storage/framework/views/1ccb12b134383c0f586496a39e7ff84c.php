<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" src="" href="<?php echo e(route('inicio')); ?>"><?php echo e(__('idioma.Inicio')); ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="<?php echo e(route('entrenos')); ?>"><?php echo e(__('idioma.Entrenos')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('tarifas')); ?>"><?php echo e(__('idioma.Tarifas')); ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo e(__('idioma.Idioma')); ?>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('idioma', 'es')); ?>"><?php echo e(__('idioma.Español')); ?></a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo e(route('idioma', 'en')); ?>"><?php echo e(__('idioma.Inglés')); ?></a>
                        </li>
                    </ul>
                </li>
                <?php if(auth()->check() && auth()->user()->rol === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?php echo e(route('administracion')); ?>"><?php echo e(__('idioma.Administracion')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if(Auth::check() == false): ?>
                <div class="d-flex gap-3">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('idioma.Iniciar Sesion')); ?></a>
                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('idioma.Registrar')); ?></a>
                </div>
            <?php else: ?>
                <a class="nav-link" href="<?php echo e(route('cerrarSesion')); ?>"><?php echo e(__('idioma.Cerrar Sesion')); ?></a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/html/laravel/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/layouts/menu.blade.php ENDPATH**/ ?>