<?php 
/*

    Título: Tarefa 3 -4  Arco da vella

    Autor: Bruno Couceiro Sande.

    Data modificación: 9/10/2024

    Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arco da Vella</title>
    <style>
        <?php
        //Medidas
        $altura = 220;
        $anchura = 440;
        //Sacar un color aleatorio
        function colorAleatorio(){
          $arrayColores = [];
          for($i = 0;$i < 11;$i++){
            $arrayColores[] = sprintf("#%06X",mt_rand(0,0xFFFFFF));

          }
          return $arrayColores;
        }
        
        //Estilo del contenedor
        echo ".container {
                background-color:white;
                display: flex;
                height: 100vh;
                width: 100%;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }";
        //Crear los estilos para cada semicirculo
          for($j=0;$j<=10;$j++){

            echo "
            .semicircle$j{
                    background-color:".colorAleatorio()[$j].";
                    height:".$altura."px;
                    width:".$anchura."px;
                    top:20px;
                    left:20px;
                    border-radius:275px 275px 0 0;
                    position:relative;
                  }";

            //calcular la altura y el ancho
            $altura=$altura-20;
            $anchura=$anchura-40;

          };
        ?>
    </style>
</head>
<body>
    <?php
    //Crear los div
    echo "<div class=\"container\">";

     //div dentro del "contenedor"
       for($i = 1;$i <= 10;$i++){
        //Imprimir todos los semicirculos

            //Primero se imprime la primera etiqueta(apertura)
        echo "<div class=\"semicircle$i\">";

       };

        //Despues la de cierre
        for($j = 1;$j <= 10;$j++){
          echo "</div>";

        }

    echo "</div>"; 

    ?>
</body>
</html>