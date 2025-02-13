<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 06/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Incluimos as clases do controlador
require_once('../../modelo/Usuario.class.php');
include_once("./controlador/ControlElemento.class.php");
include_once("./modelo/Elemento.class.php");

//Obxetos
$control = new ControlElemento();
$elemento = new Elemento();

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
    //verificamos que non esten vacios os campos
    if (empty($_POST["elementoNome"])) {
        $errosForm[] = "O nome do elemento é obrigatorio";
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$/', $_POST["elementoNome"])) {
        $errosForm[] = "O formato do nome só acepta letras,números,guións,puntos e espazos";
    }

    if (empty($_POST["material"])) {
        $errosForm[] = "O material é obrigatorio";
    }
    if (empty($_POST["colocacion"])) {
        $errosForm[] = "A colocación é obrigatoria";
    }
    //Comprobamos si a modificacion atópase vacía
    if (empty($errosForm)) {
        //Creamos o obxeto
        $elemento->crearElemento($_POST["modificacion"], $_POST["id_edificio"], $_POST["elementoNome"], $_POST["material"], $_POST["acabamento"], $_POST["ano"], $_POST["textura"], $_POST["tipo"], $_POST["colocacion"], $_POST["cor"], $_POST["comentario"]);
        //gardamos a modificacion na base de datos
        $control->updateElemento($elemento);
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
    <title>Elemento</title>
</head>

<body>
    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>

    <?php include('./menu.php'); ?>

    <button class="button"><a href="tabla_elementos.php">Volver</a></button>
    <h2>Elementos</h2>
    <div id="contenedorFormulario">

        <?php mostrarErros($errosForm); ?>

        <form action="modificar_tabla_elemento.php" method="POST" class="formulario">

            <fieldset>

                <input type="hidden" name="modificacion" value="<?php echo isset($_GET['modificarElemento']) ? $_GET['modificarElemento'] : ''; ?>">

                <input type="hidden" name="id_edificio" value="<?php echo isset($_GET['modificarElemento']) ? $control->showElemento($_GET['modificarElemento'])->getId_edificio() : ''; ?>">

                <label for="elementoNome">Nome do elemento</label>
                <input type="text" name="elementoNome" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getNome()  : "" ?>">

                <label for="material">Material</label>
                <input type="text" name="material" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getMaterial()  : "" ?>">

                <label for="acabamento">Acabamento</label>
                <input type="text" name="acabamento" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getAcabamento()  : "" ?>">

                <label for="ano">Ano de contruccion</label>
                <input type="text" name="ano" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getAno_construcion()  : "" ?>">

                <label for="textura">Textura</label>
                <input type="text" name="textura" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getTextura()  : "" ?>">

                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getTipo()  : "" ?>">

                <label for="colocacion">Colocacion</label>
                <input type="text" name="colocacion" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getColocacion()  : "" ?>">

                <label for="cor">Cor</label>
                <input type="text" name="cor" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getCor()  : "" ?>">

                <label for="comentario">Comentario</label>
                <input type="text" name="comentario" value="<?php echo isset($_GET["modificarElemento"]) ? $control->showElemento($_GET['modificarElemento'])->getComentario()  : "" ?>">

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