<?php $__env->startSection('contenido'); ?>
<div class="container" style="max:width: 700px; margin-bottom: 50px;">
    
    <div class="text-center" style="margin: 20px 0px 20px 0px">
        <span class="text-secondary">Paginación de entrenadores</span>
    </div>
    <?php if(count($entrenadores)>0): ?>{
        <section class="claseEntrenadores">
                <?php echo $__env->make('cargarEntrenadores', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
    <?php else: ?>
        <em>No hay entrenadores en este momento</em>
    <?php endif; ?>
    }
</div>
<script type="text/javascript">
    $(function(){
        // Al presionar el enlace de la paginación hace una llamada a cargarEntrenadores pasandole esa misma URL
            $('body').on('click','.pagination a',function(e){
                var url=$(this).attr('href');
                cargarEntrenadores(url);
            })

            function cargarEntrenadores(url){
                $.ajax({
                    url:url
                }).done(function(data){
                    $('.claseEntrenadores').html(data);
                }).fail(function(){
                    console.log("Error al cargar los entrenadores");
                })
            }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contenido', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lara/Proxecto_Final_Bruno_Couceiro_Sande/resources/views/paginarEntrenadores.blade.php ENDPATH**/ ?>