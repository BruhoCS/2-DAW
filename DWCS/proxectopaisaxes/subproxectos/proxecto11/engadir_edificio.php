<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 29/1/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('../../modelo/Usuario.class.php');

//Incluimos as clases do controlador
include_once("./controlador/ControlEdificio.class.php");
include_once("./controlador/ControlLocalizacion.class.php");
include_once("./controlador/ControlCor.class.php");
//Incluimos a clase dos obxetos
include_once("./modelo/Edificio.class.php");
include_once("./modelo/Localizacion.class.php");
include_once("./modelo/Cor.class.php");
//Inciamos session
session_start();

//Obxetos 
$edificio = new Edificio();
$localizacion = new Localizacion();
$cor = new Cor();

//Variable para o uso das funcions do control
$controlEdificio = new ControlEdificio();
$controlLocalizacion = new ControlLocalizacion();
$controlCor = new ControlCor();

//Array para recoller os erros
$errosForm = [];

//Funcion que mostrará todos os erros recollidos
function mostrarErros($errosForm)
{  
    foreach ($errosForm as $erro) {
        echo "<li class=\"alert alert-danger\">$erro</li>";
    }   
}

//Varibles a usar no formulario para atopar as localizacions e as cores
$localizaciones = $controlLocalizacion->indexLocalizacion();
$cores = $controlCor->indexCor();
//Variable para almacear os id das cores que escolla o usuario
$coresEscollidas = [];


//Si presionase o botón de enviar o formulario
if (isset($_POST["enviar"])) {
    //Aseguramos que os campos requeridos non atopanse baleiros
    if (empty($_POST["nomeEdificio"])) {
        $errosForm[] = "O nome do edificio atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s\-.]+$/', $_POST["nomeEdificio"])) {
        $errosForm[] = "O formato do nome só acepta letras,números,guións,puntos e espazos";
    }
    if(empty($_POST["localizacion"])){
        $errosForm[]="Debe seleccionar algunha das localizacións dispoñibles";
    }
    if (empty($_POST["cor"])) {
        $errosForm[] = "Debe seleccionar polo menos unha cor";
    } else {
        $coresEscollidas = $_POST["cor"];
    }

    //Validamos o select de Localizacion

    //Validamos o checkbox das cores
    if (empty($_POST["localizacion"])) {
        $errosForm[]="Debe seleccionar unha das localizacións dispoñibles";
    }

    //Si non hay erros no formulario
    if (empty($errosForm)) {
        //Obxeto edificio
        $edificio->crearEdificio(null,$_POST["nomeEdificio"], $_POST["localizacion"]);
        //Os introducimos nas taboas
        $controlEdificio->createEdificio($edificio, $coresEscollidas);
    }
}

//Si presiona o boton de "eliminar"
if (isset($_POST["eliminar"])) {
    //Recargamos a páxina borrando asi o formulario
    header("Location:proxecto11_form_localizacion.php");
    exit();
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

    <link rel="stylesheet" href="./vista/css/proxecto11_index.css">

    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade
    </title>

</head>

<body>

    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('menu.php');
    ?>

    <button class="button"><a href="tabla_index.php">Volver</a></button>

    <div class="container">

        <h1>FICHA DE TOMA DE DATOS CONSTRUCCIÓNS ILLADAS EN SOLO RÚSTICO</h1>

    </div>

    <div id="contenedorFormulario">

        <?php mostrarErros($errosForm); ?>

        <form class="formulario" method="POST">

            <!--Edificio-->
            <h3>Nome do edificio</h3>
            <input type="text" name="nomeEdificio" id="nomeEdificio">

            <!--Localizacion-->
            <h3>Localización</h3>
            <select name="localizacion">
                <option value=""></option>
                <?php
                foreach ($localizaciones as $local) {
                ?>
                    <option value="<?php echo $local->getId(); ?>"><?php echo $local->getComarca_paisaxistica(); ?></option>
                <?php } ?>
            </select>

            <!--Cores-->
            <h3>Cores</h3>
            <div class="checkBoxCor">
            <?php
            foreach ($cores as $nomeCor) {
            ?>
                <p style="font-size:18px;"><input type="checkbox" name="cor[]" value="<?php echo $nomeCor->getId(); ?>"><?php echo $nomeCor->getNome(); ?></p>
            <?php
            }
            ?>
            </div>
            <div>
                <button type="submit" name="enviar" id="enviar" class="button">Enviar</button>
                <button type="submit" name="eliminar" id="eliminar" class="button">Eliminar</button>
            </div>
        </form>
    </div>
    <?php include('../../vista/layout/pe.php'); ?>
</body>

</html>