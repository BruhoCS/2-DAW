<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 1/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases
require_once('../../modelo/Usuario.class.php');

//Incluimos as clases do controlador
include_once("./controlador/ControlElemento.class.php");


include_once("./modelo/Elemento.class.php");

//Obxeto control
$control = new ControlElemento();

$elemento = new Elemento();

//Almaceamos o id do edificio
$id_edificio = $_GET["idEdificio"];

//presionase o botón de eliminar
if (isset($_GET["id"])) {
    //eliminamos o elemento 
    $control->destroyElemento($_GET["id"]);
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
        <button class="button" id="engadir" name="engadir"><a href="engadir_elemento.php?idEdificio=<?php echo $id_edificio?>">Novo elemento</a></button>
    <h2>Elementos</h2>
    
        <table>
            <tr>
                <th>Nome</th>
                <th>Material</th>
                <th>Acabamento</th>
                <th>Ano contrucción</th>
                <th>Textura</th>
                <th>Tipo</th>
                <th>Colocación</th>
                <th>Cor</th>
                <th>Comentario</th>
                <th>Accións</th>
            </tr>
            <?php 
                //Obtenmos a taboa dos elementos
                $elementos = $control->indexElementoDoEdificio($id_edificio);

                //Facemos un foreach para crear as filas da taboa cos datos dos elementos
                foreach($elementos as $elemento){
            ?>       
            <tr>
                <td><?php echo $elemento->getNome(); ?></td>
                <td><?php echo $elemento->getMaterial(); ?></td>
                <td><?php echo $elemento->getAcabamento(); ?></td>
                <td><?php echo $elemento->getAno_construcion(); ?></td>
                <td><?php echo $elemento->getTextura(); ?></td>
                <td><?php echo $elemento->getTipo(); ?></td>
                <td><?php echo $elemento->getColocacion(); ?></td>
                <td><?php echo $elemento->getCor(); ?></td>
                <td><?php echo $elemento->getComentario(); ?></td>
                <td>
                    <a href="modificar_tabla_elemento.php?modificarElemento=<?php echo $elemento->getId() ?>">Modificar</a>
                    <a href="tabla_elementos.php?id=<?php echo $elemento->getId() ?>" name="eliminar">Eliminar</a>
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