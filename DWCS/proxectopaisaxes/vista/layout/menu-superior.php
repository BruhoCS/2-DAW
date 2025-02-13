<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: NON TOCAR!!!

    @Data modificación: 08/11/2024

    @Versión 1.0 

    IMPORTANTE >>>>>>>>>>>>>>>>>>>>>>> ESTA PÁXINA NON É MODIFICABLE!!!

*/
?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">

        <button style="color: #FFF" class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarNav" class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $ruta; ?>index.php">Contribucións</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $ruta; ?>presentacion.php">Presentación</a>
                </li>
                <?php if (isset($_SESSION['usuario'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ruta; ?>sair.php">Saír</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $ruta; ?>login.php">Acceder</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>