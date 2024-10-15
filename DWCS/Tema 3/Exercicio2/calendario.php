<?php
/*

    Título: Tarefa 2 - 1 Comezando con PHP

    Autor: Nome da persoa que modifica a páxina.

    Data modificación: Data na que se modificou por última vez o documento

    Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
</head>
<body>
    <table border="2px" >
        <tr>
            <th>LUNES</th>
            <th>MARTES</th>
            <th>MIERCOLES</th>
            <th>JUEVES</th>
            <th>VIERNES</th>
            <th>SABADO</th>
            <th>DOMINGO</th>
        </tr>
        <?php 
        //Primer dia del mes
        $primerDia = new DateTime("01-01-2024");
        //Funcioni
        function calendario($primerDia){

            //calcular los dias del mes
            $diasMes = cal_days_in_month(CAL_GREGORIAN,$primerDia->format("m"),$primerDia->format("Y"));

            //Pintar fines de semana
            $contadorColumnas = 0;

            //Dejar huecos libres hasta el primer dia del mes 
            for($i = 1;$i < $primerDia->format("d");$i++){
                echo "<td></td>";
                $contadorColumnas ++;
            }

            //Mostrar numeros en los dias correspondientes
            while((int)$primerDia->format("d") <= $diasMes) {
                // Insertar salto de fila cada 7 días
                if($contadorColumnas == 7) {
                    echo "</tr><tr>";
                    $contadorColumnas = 0;
                }
        
                // Colorear los fines de semana
                if($contadorColumnas == 5 || $contadorColumnas == 6) { // Sábado o Domingo
                    echo "<td style=\"background-color:red\">".$primerDia->format("d")."</td>";
                } else {
                    // Escribe el día normalmente
                    echo "<td>". $primerDia->format("d") ."</td>";
                }
        
                // Suma 1 al día y al contador de columnas
                $primerDia->modify('+1 day');
                $contadorColumnas++;

                 // Detener el bucle si cambia el mes
                 if ((int)$primerDia->format("d") == 1) {
                    break;
                }
            }

                
    }

    echo calendario($primerDia);
        ?>
    </table>
</body>
</html>