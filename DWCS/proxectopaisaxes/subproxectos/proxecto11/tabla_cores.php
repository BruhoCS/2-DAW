<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 11/12/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases
require_once('../../modelo/Usuario.class.php');
include_once("./controlador/ControlCor.class.php");
include_once("./modelo/Cor.class.php");

//Obxeto control
$control = new ControlCor();
//Obxeto cor
$cor = new Cor();


//si presionase o boton de eliminar
if (isset($_GET["id"])) {
    //eliminamos o cor
    $control->destroyCor($_GET["id"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vista/css/app.css">

    <link rel="stylesheet" href="./vista/css/proxecto11_index.css">
    <link rel="stylesheet" href="./vista/css/estilo_tablas.css">
    <title>Document</title>
</head>
<body>
    
    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="tabla_index.php">Volver</a></button>
    <div class="container">
    <h2>Cores</h2>


    <button class="button" id="engadir" name="engadir"><a href="engadir_cor.php" >Nova Cor</a></button>
        <table>
            <tr>
                <th>Nome</th>
                <th>Gama</th>
                <th>Tipo</th>
                <th>Accións</th>
            </tr>
            <?php 
                //Obtenmos a taboa das cores
                $cores = $control->indexCor();

                //Facemos un foreach para crear as filas da taboa cos datos das cores
                foreach($cores as $cor){
             ?>       
             <tr>
                <td><?php echo $cor->getNome(); ?></td>
                <td><?php echo $cor->getGama_cromatica(); ?></td>
                <td><?php echo $cor->getTipo(); ?></td>
                <td>
                    <a href="modificar_tabla_cor.php?modificarCor=<?php echo $cor->getId() ?>">Modificar</a>
                    <a href="tabla_cores.php?id=<?php echo $cor->getId() ?>" name="eliminar">Eliminar</a>
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