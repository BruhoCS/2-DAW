<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 2/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases do controlador
include_once("./controlador/ControlLocalizacion.class.php");

include_once("./modelo/Localizacion.class.php");

//Obxetos
$control = new ControlLocalizacion();
$localizacion = new Localizacion();

//Array onde almacenaremos todos os erros
$errosForm = [];

//Funcion que mostrará todos os erros recollidos
function mostrarErros($errosForm)
{
    foreach ($errosForm as $erro) {
        echo "<li class=\"alert alert-danger\">$erro</li>";
    }
}

//Si presionamos 
if (isset($_POST["cancelar"])) {
    //redirige inicio 
    header("Location:tabla_index.php");
    exit();
}

//Si presionase o botón de enviar o formulario
if (isset($_POST["enviar"])) {

    //Aseguramos que os campos requeridos non atopanse baleiros e cumpren o regex
    if (empty($_POST["comarca"])) {
        $errosForm[] = "O nome da comarca atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/', $_POST["comarca"])) {
        $errosForm[] = "O formato da comarca só acepta letras";
    }
    if(empty($_POST["localidade"])){
        $errosForm[] = "O nome da localidade atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/', $_POST["localidade"])) {
        $errosForm[] = "O formato da localidade só acepta letras";

    }
    if(empty($_POST["concello"])){
        $errosForm[] = "O nome do concello atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/', $_POST["concello"])) {
        $errosForm[] = "O formato do concello só acepta letras";
    }

    //Si non hay erros no formulario
    if (empty($errosForm)) {
        //Creamos os obxetos
        //Obxeto localizacion
        $localizacion->crearLocalizacion(null, $_POST["comarca"], $_POST["localidade"], $_POST["concello"], $_POST["numero"], $_POST["rua"], $_POST["parroquia"], $_POST["provincia"], $_POST["area"], $_POST["postal"]);

        //Os introducimos nas taboas
        $control->createLocalizacion($localizacion);
    }
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
    <title>Localizacion</title>
</head>

<body>

    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="tabla_localizacion.php">Volver</a></button>

    <div id="contenedorFormulario">
        <h2>Localización do Edificio</h2>

        <?php mostrarErros($errosForm); ?>

        <form action="engadir_localizacion.php" method="POST" class="formulario">

            <label for="comarca">Comarca</label>
            <input type="text" name="comarca">

            <label for="localidade">Localidade</label>
            <input type="text" name="localidade">

            <label for="concello">Concello</label>
            <input type="text" name="concello">

            <label for="numero">Numero</label>
            <input type="text" name="numero">

            <label for="textura">Rua</label>
            <input type="text" name="rua">

            <label for="parroquia">Parroquia</label>
            <input type="text" name="parroquia">

            <label for="provincia">Provincia</label>
            <input type="text" name="provincia">

            <label for="area">Area paisaxistica</label>
            <input type="text" name="area">

            <label for="postal">Código postal</label>
            <input type="text" name="postal">

            <div>
                <button type="submit" name="enviar" class="button">Enviar</button>
                <button type="submit" name="cancelar" class="button">Cancelar</button>
            </div>

            </fieldset>
        </form>
    </div>
    <?php include('../../vista/layout/pe.php'); ?>
</body>

</html>