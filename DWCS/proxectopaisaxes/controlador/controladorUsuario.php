<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade 
    
    @Autor: NON TOCAR!!!

    @Data modificación: 08/11/2024

    @Versión 1.0 

    IMPORTANTE >>>>>>>>>>>>>>>>>>>>>>> ESTA PÁXINA NON É MODIFICABLE!!!

*/

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
include_once('modelo/DAO.class.php');

class controladorUsuario{

      public static function acceder(string &$erro, string $login, string $contrasinal, string $lembrarme = null): void {            

            // Cookie lembrarme

            if (isset($lembrarme) && (!empty($login))) {
               // Establece unha cookie coa información de autenticación (o nome de usuario ou login)
               setcookie("usuario", $login, time() + 3600 * 24 * 30); // Cookie válida durante 30 días
            }      

            // Validación dos campos
            if (empty($login) || empty($contrasinal)) {
                  $erro = "Os dous campos son obrigatorios.";
            } else {
                  $obxectoUsuario = DAO::obterUsuarioPorLogin($login);

                  if (!empty($obxectoUsuario) && password_verify($contrasinal, $obxectoUsuario->hashContrasinal)) {  
                    // Gardamos o obxecto usuario completo na sesión    
                    $_SESSION['usuario'] = $obxectoUsuario;                      
                    header("Location: index.php");
                    exit;
                  } else {
                    $erro = "Usuario ou contrasinal incorrectos.";
                  }
            }
            
      }

    }
?>