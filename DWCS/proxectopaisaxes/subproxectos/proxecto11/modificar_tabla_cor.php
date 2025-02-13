<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto 11
    
    @Autor:Bruno Couceiro Sande 

    @Data modificación: 5/2/2025

    @Versión 2.0 # Irá incrementándose con cada cambio/entrega.

*/

//Incluimos as clases do controlador
require_once('../../modelo/Usuario.class.php');
include_once("./controlador/ControlCor.class.php");
include_once("./modelo/Cor.class.php");

session_start();

//Obxetos
$controlCor = new ControlCor();
$cor = new Cor();

//erros
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
    if (empty($_POST["corNome"])) {
        $errosForm[] = "O nome do cor atópase baleiro"; //Erro no caso no que o input atópese vacío
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9]+$/', $_POST["corNome"])) {
        $errosForm[] = "O formato do nome só acepta letras,números,guións,puntos e espazos";
    }
    if (empty($_POST["gama"])) {
        $errosForm[] = "O campo de 'gama' debe estar cuberto";
    } elseif (!preg_match('/^#[A-Za-z0-9]/', $_POST["gama"])) {
        $errosForm[] = "A gama cromática da cor debe empezar por '#' seguido por numeros ou letras";
    }
    if (empty($_POST["modificarTipo"])) {
        $errosForm[] = "Debe escoller algun tipo para a cor";
    }
    //Comprobamos si a modificacion atópase vacía
    if (empty($errosForm)) {
        $cor->crearCor((int)$_POST["modificacion"], $_POST["corNome"], $_POST["gama"], $_POST["modificarTipo"]);

        $controlCor->updateCor($cor);
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

        <form action="modificar_tabla_cor.php" method="POST" class="formulario">

            <fieldset>
                <input type="hidden" name="modificacion" value="<?php echo isset($_GET['modificarCor']) ? $_GET['modificarCor'] : ''; ?>">

                <label for="corNome">Nome</label>
                <input type="text" name="corNome" value="<?php echo isset($_GET["modificarCor"]) ? $controlCor->showCor($_GET['modificarCor'])->getNome()  : "" ?>">

                <label for="gama">Gama</label>
                <input type="text" name="gama" value="<?php echo isset($_GET["modificarCor"]) ? $controlCor->showCor($_GET['modificarCor'])->getGama_cromatica()  : "" ?>">

                <label for="tipo">Tipo</label>
                <select name="modificarTipo">
                    <?php
                    $tipos = $controlCor->indexCor(); //obtemos todos os cores
                    foreach ($tipos as $tipo) {
                        //Seleccionamos o tipo dar cor segun o id 
                        $rellenar = (isset($_POST["modificarTipo"]) && $_POST["modificarTipo"] == $tipo->getId()) ? "selected" : "";

                    ?>
                        <option value="<?php echo $tipo->getTipo(); ?>" <?php echo $rellenar; ?>>
                            <?php echo $tipo->getTipo(); //Mostramos o tipo correspondente da cor
                            ?>
                        </option>

                    <?php } ?>
                </select>

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