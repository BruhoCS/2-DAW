<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 6/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases do controlador
include_once("./controlador/ControlLocalizacion.class.php");

include_once("./modelo/Localizacion.class.php");

//Obxetos
$control = new ControlLocalizacion();
$localizacion = new Localizacion();

//Erros
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

//Si pulsamos o boton gardar
if (isset($_POST["gardar"])) {

    //Facemos as validacións dos campos
    if (empty($_POST["comarca"])) {
        $errosForm[] = "O nome da comarca paisaxistica non pode estar baleira";
    }
    if (empty($_POST["localidade"])) {
        $errosForm[] = "A localidade non pode estar baleira";
    }
    if (empty($_POST["concello"])) {
        $errosForm[] = "O nome do concello non pode estar baleiro";
    }

    //Comprobamos si a modificacion atópase vacía
    if (empty($errosForm)) {
        //Creamos o obxeto
        $localizacion->crearLocalizacion($_POST["modificacion"], $_POST["comarca"], $_POST["localidade"], $_POST["concello"], $_POST["numero"], $_POST["rua"], $_POST["parroquia"], $_POST["provincia"], $_POST["area"], $_POST["postal"]);
        //gardamos a modificacion na base de datos
        $control->updateLocalizacion($localizacion);
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

        <form action="modificar_tabla_localizacion.php" method="POST" class="formulario">

            <input type="hidden" name="modificacion" value="<?php echo isset($_GET['modificarLocalizacion']) ? $_GET['modificarLocalizacion'] : ''; ?>">

            <label for="comarca">Comarca</label>
            <input type="text" name="comarca" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getComarca_paisaxistica()  : "" ?>">

            <label for="localidade">Localidade</label>
            <input type="text" name="localidade" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getLocalidade()  : "" ?>">

            <label for="concello">Concello</label>
            <input type="text" name="concello" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getConcello()  : "" ?>">

            <label for="numero">Numero</label>
            <input type="text" name="numero" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getNumero()  : "" ?>">

            <label for="textura">Textura</label>
            <input type="text" name="rua" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getRua()  : "" ?>">

            <label for="parroquia">Parroquia</label>
            <input type="text" name="parroquia" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getParroquia()  : "" ?>">

            <label for="provincia">Provincia</label>
            <input type="text" name="provincia" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getProvincia()  : "" ?>">

            <label for="area">Area paisaxistica</label>
            <input type="text" name="area" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getArea_paisaxistica()  : "" ?>">

            <label for="postal">Código postal</label>
            <input type="text" name="postal" value="<?php echo isset($_GET["modificarLocalizacion"]) ? $control->showLocalizacion($_GET['modificarLocalizacion'])->getCod_postal()  : "" ?>">

            <div>
                <button type="submit" name="gardar" class="button">Gardar</button>
                <button type="submit" name="cancelar" class="button">Cancelar</button>
            </div>

            </fieldset>
        </form>
    </div>
    <?php include('../../vista/layout/pe.php'); ?>
</body>

</html>