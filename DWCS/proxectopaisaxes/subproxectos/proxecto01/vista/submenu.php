<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto XXX
    
    @Autor: 

    @Data modificación: 08/11/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/
?>
<nav class="navbar-secundaria navbar-expand-lg navbar-light mb-3">
    <div class="container-fluid">
        <span class="subproxecto-titulo me-auto">Título subproxecto</span>

        <button style="color: #FFF" class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSecundario" aria-controls="navbarSecundario" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarSecundario" class="collapse navbar-collapse">
            <!-- Opcións do menú á dereita -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Parte pública</a>
                </li>
                <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'administrador')) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#crud1">CRUD1</a></li>
                            <li><a class="dropdown-item" href="#crud2">CRUD2</a></li>
                            <li><a class="dropdown-item" href="#crud3">CRUD3</a></li>
                            <li><a class="dropdown-item" href="#crud4">CRUD4</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

