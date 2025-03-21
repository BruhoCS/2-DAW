<?php if(isset($nombres)): ?>
    <?php if(count($nombres) > 0): ?>
        <?php $__currentLoopData = $nombres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="p-2"><a href="/entren/<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></a></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <em>No hay resultados</em>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/entrenadoresapifetch.blade.php ENDPATH**/ ?>