<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: NON TOCAR!!!

    @Data modificación: 08/11/2024

    @Versión 1.0 

    IMPORTANTE >>>>>>>>>>>>>>>>>>>>>>> ESTA PÁXINA NON É MODIFICABLE!!!

*/

// Axuste relativo en función do cartafol onde se execute o script
$currentUrl = $_SERVER['REQUEST_URI']; 
if (strpos($currentUrl, '/subproxectos/') !== false) {
    $ruta = "../../";
} else {
    $ruta = "./";
}
?>
<div class="my-0 d-flex justify-content-center" style="margin: 0; padding: 0;">
    <a href="index.php"  style="margin: 0; padding: 0;">
        <img src="<?php echo $ruta; ?>vista/imx/logo-proxecto-paisaxe_v2.png" alt="Logo Proxecto Paisaxe" class="img-fluid" style="margin: 0.5rem; padding: 0;max-width: 400px; height: 150px;">
    </a>
</div>