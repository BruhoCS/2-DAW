<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 11/12/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases
require_once('../../modelo/Usuario.class.php');

//Incluimos as clases do controlador
include_once("./controlador/ControlLocalizacion.class.php");

include_once("./modelo/Localizacion.class.php");

//Obxeto control
$control = new ControlLocalizacion();

$localizacion = new Localizacion();

//Si presionase o botón de "engadir"
if(isset($_POST["engadir"])){
    //Reenviarase ao user ao formulario correspondente
    header("Location:modificar_tabla_localizacion.php ");
    exit();
}

//Si presionase o botón de eliminar
if (isset($_GET["id"])) {
    //eliminamos a localización
    $control->destroyLocalizacion($_GET["id"]);
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
    <title>Localizaciones</title>
</head>
<body>
    
    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="tabla_index.php">Volver</a></button>
    <div class="container">
    <button class="button" id="engadir" name="engadir"><a href="engadir_localizacion.php">Nova Localizacion</a></button>
    <h2>Localizacion</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Localidade</th>
                <th>Concello</th>
                <th>Numero</th>
                <th>Rua</th>
                <th>Parroquia</th>
                <th>Provincia</th>
                <th>Area paisaxística</th>
                <th>Codigo postal</th>
                <th>Accións</th>
            </tr>
            <?php 
                //Obtenmos a taboa da localizacion
                $localizaciones = $control->indexLocalizacion();

                //Facemos un foreach para crear as filas da taboa cos datos da localizacion
                foreach($localizaciones as $localizacion){
             ?>       
             <tr>
                <td><?php echo $localizacion->getComarca_paisaxistica(); ?></td>
                <td><?php echo $localizacion->getLocalidade(); ?></td>
                <td><?php echo $localizacion->getConcello(); ?></td>
                <td><?php echo $localizacion->getNumero(); ?></td>
                <td><?php echo $localizacion->getRua(); ?></td>
                <td><?php echo $localizacion->getParroquia(); ?></td>
                <td><?php echo $localizacion->getProvincia(); ?></td>
                <td><?php echo $localizacion->getArea_paisaxistica(); ?></td>
                <td><?php echo $localizacion->getCod_postal(); ?></td>
                <td>
                    <a href="modificar_tabla_localizacion.php?modificarLocalizacion=<?php echo $localizacion->getId() ?>">Modificar</a>
                    <a href="tabla_localizacion.php?id=<?php echo $localizacion->getId() ?>" name="eliminar">Eliminar</a>
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