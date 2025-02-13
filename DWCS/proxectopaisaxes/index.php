<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: # Se alguén modifica a páxina debe indicalo

    @Data modificación: 08/11/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('modelo/Usuario.class.php');
session_start();
?>
<!DOCTYPE html>
<html lang="gl">
    <head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="vista/css/app.css">

    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade 
    </title>

</head>
<body>

    <?php include('vista/layout/cabeceira.php'); ?>

    <?php include('vista/layout/menu-superior.php'); ?>


    <div class="container mt-4">
        <h2 class="text-center mb-4">Achegas dos estudantes</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Proxecto 1 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 1">
                    <div class="card-body">
                        <h5 class="card-title"><a href="subproxectos/proxecto01">Proxecto 1</a></h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
            <!-- Proxecto 2 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 2">
                    <div class="card-body">
                        <h5 class="card-title">Proxecto 2</h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
            <!-- Proxecto 3 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 3">
                    <div class="card-body">
                        <h5 class="card-title">Proxecto 3</h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
            <!-- Proxecto 4 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 4">
                    <div class="card-body">
                        <h5 class="card-title">Proxecto 4</h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
            <!-- Proxecto 5 -->
            <div class="col">
                <div class="card">                
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 5">
                    <div class="card-body">
                        <h5 class="card-title">Proxecto 5</h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
            <!-- Proxecto 6 -->
            <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 6">
                    <div class="card-body">
                        <h5 class="card-title">Proxecto 6</h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
        </div>

         <!-- Proxecto 11 -->
         <div class="col">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="(Accesibilidade) Descrición da imaxe 6">
                    <div class="card-body">
                    <h5 class="card-title"><a href="subproxectos/proxecto11/index.php">Proxecto 11</a></h5>
                        <p class="card-text">Descrición breve do proxecto.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
    <?php include('vista/layout/pe.php'); ?>
    	
</body></html>