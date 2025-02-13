<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 6/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('../../modelo/Usuario.class.php');
//Incluimos as clases do controlador
include_once("./controlador/ControlCor.class.php");
include_once("./modelo/Cor.class.php");

//Variable para o uso das funcions do control
$controlCor = new ControlCor();
//Creamos o obxeto Cor
$cor = new Cor();
//Array erros
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

    //Aseguramos que os campos requeridos non atopanse baleiros
    if (empty($_POST["corNome"])) {
        $errosForm[] = "O nome do cor atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$/', $_POST["corNome"])) {
        $errosForm[] = "O formato do nome só acepta letras,números,guións,puntos e espazos";
    }
    if (empty($_POST["gama"])) {
        $errosForm[] = "O campo de 'gama' debe estar cuberto";
    } elseif (!preg_match('/^#[A-Za-z0-9]/', $_POST["gama"])) {
        $errosForm[] = "A gama cromática da cor debe empezar por '#' seguido por numeros ou letras";
    }
    if (empty($_POST["tipo"])) {
        $errosForm[] = "Debe escoller algun tipo para a cor";
    }

    //Si non hay erros no formulario
    if (empty($errosForm)) {
        //Obxeto edificio
        $cor->crearCor(null, $_POST["corNome"], $_POST["gama"], $_POST["tipo"]);
        //Os introducimos nas taboas
        $controlCor->createCor($cor);
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

    <link rel="stylesheet" href="./vista/css/estilo_modificar.css">
    <title>Cor</title>
</head>

<body>

    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="tabla_cores.php">Volver</a></button>
   
        <h2>Cor</h2>
  
    <div id="contenedorFormulario">

    <?php mostrarErros($errosForm); ?>
        <form action="engadir_cor.php" method="POST" class="formulario">
            
       
            <fieldset>

                <label for="corNome">Nome</label>
                <input type="text" name="corNome">

                <label for="gama">Gama</label>
                <input type="text" name="gama">

                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value=""></option>
                    <option value="dominante">dominante</option>
                    <option value="mediacion">mediacion</option>
                    <option value="tonico">tonico</option>
                </select>

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