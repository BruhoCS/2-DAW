<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 08/12/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/


?>

<link rel="stylesheet" href="./vista/css/proxecto11_menu.css">
        <!-- Comprobación si la sesión es administrador -->
        <?php if (!empty($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]->login == "admin") { ?>
                <div class="menu-container">
                    <button class="menu-btn">Administración</button>
                    <div class="menu-content">
                        <a href="index.php">Inicio</a>
                        <a href="tabla_index.php">Edificios</a>
                        <a href="tabla_cores.php">Cores</a>
                        <a href="tabla_elementos.php">Elementos</a>
                        <a href="tabla_localizacion.php">Localizacións</a>
                    </div>
                </div>
        <?php }
        } ?>


