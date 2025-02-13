<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 18/12/2024

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('../../modelo/Usuario.class.php');

session_start();

?>

<!DOCTYPE html>
<html lang="gl">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vista/css/app.css">

    <link rel="stylesheet" type="text/css" href="vista/css/proxecto11_index.css">


    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade
    </title>

</head>

<body>

    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <div class="menus">
        <?php
        include('menu.php');
        include('menuPublic.php');
        ?>

    </div>
    <div class="container">

        <h1>FICHA DE TOMA DE DATOS CONSTRUCCIÓNS ILLADAS EN SOLO RÚSTICO</h1>

        <p>Nesta páxina poderás rexistrar edificios coas súas características</p>


        <div class="contidoIndex">
            <p>Pulsa no seguinte botón para rexistrar un novo edificio</p>
            <button class="button"><a href="engadir_edificio.php">Rexistrar</a></button>
            <img src="./vista/imagenes/imagenInicio.jpg" alt="Imagen dun poligono industrial sostenible">
        </div>
    </div>

    <?php include('../../vista/layout/pe.php'); ?>

</body>

</html>