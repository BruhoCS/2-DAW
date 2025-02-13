<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: # Se alguén modifica a páxina debe indicalo

    @Data modificación: 08/11/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('modelo/Usuario.class.php');
session_start();
?>
<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="vista/css/app.css">

    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade
    </title>
</head>
<?php
$erro = "";
if (isset($_POST['login'])) {
    include('controlador/controladorUsuario.php');
    $lembrarme = $_POST['lembrarme'] ?? "";
    controladorUsuario::acceder($erro, $_POST['usuario'], $_POST['contrasinal'], $lembrarme);
}
?>

<body class="login-page">

    <?php include('vista/layout/cabeceira.php'); ?>

    <?php include('vista/layout/menu-superior.php'); ?>

    <div class="container p-4 bg-white shadow rounded" style="max-width: 400px; margin-top: 4rem">
        <h3 class="text-center mb-3">Acceso</h3>
        <hr>
        <?php if (!empty($erro)) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php } ?>

        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nome de Usuario</label>
                <input type="text" class="form-control" placeholder="O seu nome de usuario" required autofocus value="<?php echo isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : ''; ?>" name="usuario" id="usuario">
            </div>

            <div class="mb-3">
                <label for="contrasinal" class="form-label">Contrasinal</label>
                <input type="password" class="form-control" placeholder="O seu contrasinal" required name="contrasinal" id="contrasinal">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="lembrarme" id="lembrarme">
                <label class="form-check-label" for="lembrarme">Lémbrame</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 boton" name="login">Login</button>
        </form>
    </div>


    <?php include('vista/layout/pe.php'); ?>

</body>

</html>