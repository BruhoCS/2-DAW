<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 4/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases do controlador
require_once('../../modelo/Usuario.class.php');
include_once("./controlador/ControlEdificio.class.php");
include_once("./controlador/ControlCor.class.php");
include_once("./controlador/ControlLocalizacion.class.php");
include_once("./modelo/Edificio.class.php");

session_start();

//Obxetos
$control = new ControlEdificio();
$edificio = new Edificio();
$localizacion = new Localizacion();

//conseguir o id das cores
$controlCor = new ControlCor();

$cores = $controlCor->indexCor();

//control das localizacions
$controlLocalizacion = new ControlLocalizacion();
$localizaciones = $controlLocalizacion->indexLocalizacion();

//Array onde almeacenaremos os erros
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

    //Aseguramos que os campos requeridos non atopanse baleiros
    if (empty($_POST["modificarNome"])) {
        $errosForm[] = "O nome do edificio atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\-.]+$/', $_POST["modificarNome"])) {
        $errosForm[] = "O formato do nome só acepta letras,números,guións,puntos e espazos";
    }
    if (empty($_POST["modificarLocalizacion"])) {
        $errosForm[] = "Debe seleccionar algunha das localizacións dispoñibles";
    }
    if (empty($_POST["cor"])) {
        $errosForm[] = "Debe seleccionar polo menos unha cor";
    } else {
        $coresEscollidas = $_POST["cor"];
    }

    if (empty($errosForm)) {
        //Creamos o novo obxeto de edificio
        $edificio->crearEdificio($_GET["modificarEdificio"], $_POST["modificarNome"], (int) $_POST["modificarLocalizacion"]);

        //Actualizamos a base de datos
        $control->updateEdifico($edificio, $_POST["cor"]);
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
    <title>Edificio</title>
</head>

<body>
    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="tabla_index.php">Volver</a></button>

    <div id="contenedorFormulario">
        <h1>Modificar edificio</h1>
        
        <?php mostrarErros($errosForm); ?>

        <form class="formulario" method="POST">

            <!--Id do edificio-->
            <input type="hidden" name="modificacion" value="<?php echo isset($_GET['modificarEdificio']) ? $_GET['modificarEdificio'] : ''; ?>">

            <!--Edificio-->
            <label for="modificarNome">Nome</label>
            <input type="text" name="modificarNome" value="<?php echo isset($_GET["modificarEdificio"]) ? $control->showEdificio($_GET['modificarEdificio'])->getNome()  : null ?>">

            <!--Localizacion-->
            <h3>Localización</h3>
            <select name="modificarLocalizacion">
                <?php
                foreach ($localizaciones as $local) {

                    $rellenar = (isset($_POST["modificarLocalizacion"]) && $_POST["modificarLocalizacion"] == $local->getId()) ? "selected" : "";

                ?>
                    <option value="<?php echo $local->getId(); ?>" <?php echo $rellenar; ?>><?php echo $local->getComarca_paisaxistica(); ?></option>
                <?php } ?>
            </select>

            <!--Cores-->
            <h3>Cores</h3>
            <div>
                <?php
                foreach ($cores as $nomeCor) {
                ?>
                    <p style="font-size:18px;"><input type="checkbox" name="cor[]" value="<?php echo $nomeCor->getId(); ?>"><?php echo $nomeCor->getNome(); ?></p>
                <?php
                }
                ?>
            </div>
            <div>
                <button type="submit" name="gardar" id="enviar" class="button">Enviar</button>
                <button type="submit" name="eliminar" id="eliminar" class="button">Eliminar</button>
            </div>
        </form>
    </div>
    <?php include('../../vista/layout/pe.php'); ?>
</body>

</html>