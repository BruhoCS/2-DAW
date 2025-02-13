<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 6/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('../../modelo/Usuario.class.php');
//Incluimos as clases do controlador
include_once("./controlador/ControlElemento.class.php");
include_once("./modelo/Elemento.class.php");

//Obxetos
$controlElemento = new ControlElemento();
$elemento = new Elemento();

//Array erros
$errosForm = [];
//Funcion que mostrará todos os erros recollidos
function mostrarErros($errosForm)
{
    foreach ($errosForm as $erro) {
        echo "<li class=\"alert alert-danger\">$erro</li>";
    }
}

//Almaceamos o id do edificio
if (isset($_GET["idEdificio"])) {
    $id_edificio = $_GET["idEdificio"];
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
    if (empty($_POST["elementoNome"])) {
        $errosForm[] = "O nome do elemento atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ]+$/', $_POST["elementoNome"])) {
        $errosForm[] = "O formato do nome só acepta letras,números,guións,puntos e espazos";
    }
    if (empty($_POST["material"])) {
        $errosForm[] = "O material é obrigatorio";
    }
    if (empty($_POST["colocacion"])) {
        $errosForm[] = "A colocación é obrigatoria";
    }

    //Si non hay erros no formulario
    if (empty($errosForm)) {
        //Obxeto edificio
        $elemento->crearElemento(null, $_POST["id_edificio"], $_POST["elementoNome"], $_POST["material"], $_POST["acabamento"], $_POST["ano"], $_POST["textura"], $_POST["tipo"], $_POST["colocacion"], $_POST["cor"], $_POST["comentario"]);
        //Os introducimos nas taboas
        $controlElemento->createElemento($elemento);
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


    <button class="button"><a href="tabla_index.php">Volver</a></button>
    <h2>Elementos do Edificio</h2>
    <div id="contenedorFormulario">

        <?php mostrarErros($errosForm); ?>

        <form action="engadir_elemento.php" method="POST" class="formulario">

            <fieldset>

                <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>">

                <label for="elementoNome">Nome do elemento</label>
                <input type="text" name="elementoNome">

                <label for="material">Material</label>
                <input type="text" name="material">

                <label for="acabamento">Acabamento</label>
                <input type="text" name="acabamento">

                <label for="ano">Ano de contruccion</label>
                <input type="date" name="ano">

                <label for="textura">Textura</label>
                <input type="text" name="textura">

                <label for="tipo">Tipo</label>
                <input type="text" name="tipo">

                <label for="colocacion">Colocacion</label>
                <input type="text" name="colocacion">

                <label for="cor">Cor</label>
                <input type="text" name="cor">

                <label for="comentario">Comentario</label>
                <input type="text" name="comentario">

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