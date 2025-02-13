<?php
/*

    @Título: Proxecto Ríos
    
    @Autor: NON TOCAR!!!

    @Data modificación: 08/11/2024

    @Versión 1.0 

    IMPORTANTE >>>>>>>>>>>>>>>>>>>>>>> ESTA PÁXINA NON É MODIFICABLE!!!

*/
// autoload.php >>> Fai o include de cada clase que se chame
// No include indícase a ruta "clases" e a extensión .class 
spl_autoload_register( function( $nomeClase ) {
    include_once("clases/" . $nomeClase . '.class.php');
} );
?>