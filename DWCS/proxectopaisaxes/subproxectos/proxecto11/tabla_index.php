<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 1/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('../../modelo/Usuario.class.php');

//Incluimos as clases do controlador
include_once("./controlador/ControlEdificio.class.php");

include_once("./modelo/Edificio.class.php");

session_start();

//Obxeto control
$controlEdificio = new ControlEdificio();
$edificio = new Edificio();

//Si presionase o botón de "engadir"
if(isset($_POST["engadir"])){
    //Reenviarase ao user ao formulario correspondente
    header("Location:modificar_tabla_edificio.php ");
    exit();
}

//si presionase o boton de eliminar
if (isset($_GET["id"])) {
    //eliminamos o edificio 
    $controlEdificio->destroyEdificio($_GET["id"]);
}

?>
<!DOCTYPE html>
<html lang="gl">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vista/css/app.css">
    <link rel="stylesheet" href="./vista/css/estilo_tablas.css">
    <link rel="stylesheet" href="./vista/css/proxecto11_index.css">

    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade
    </title>

</head>

<body>

    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="engadir_edificio.php">Engadir Edificio</a></button>
    <div class="container">

        <h1>FICHA DE TOMA DE DATOS CONSTRUCCIÓNS ILLADAS EN SOLO RÚSTICO</h1>

        <h2>Edificios rexistrados</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Cor</th>
                <th>Elemento</th>
                <th>Localizacion</th>
                <th>Accións</th>
            </tr>
            <?php 
                //Obtenmos a taboa dos edificios
                $edificios = $controlEdificio->indexEdificio();

                //Facemos un foreach para crear as filas da taboa cos datos dos edificios
                foreach($edificios as $edificio){
             ?>       
             <tr>
                <td><?php echo $edificio->getNome(); ?></td>
                <td><a href="colores_de_edificio.php?idEdificio=<?php echo $edificio->getId();?>">Cores</a></td>
                <td><a href="elementos_do_edificio.php?idEdificio=<?php echo $edificio->getId();?>">Elementos</a></td>
                <td><a href="tabla_localizacion.php?idEdificio=<?php echo $edificio->getId();?>">Localizacións</a></td>
                <td>
                    <a href="modificar_tabla_edificio.php?modificarEdificio=<?php echo $edificio->getId(); ?>">Modificar</a>
                    <a href="tabla_index.php?id=<?php echo $edificio->getId(); ?>" name="eliminar">Eliminar</a>
                </td>
             </tr>
            <?php        
                }
            ?>
        </table>        
    </div>

    <?php include('../../vista/layout/pe.php'); ?>

</body>

</html>