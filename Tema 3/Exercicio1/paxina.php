<?php 
/*

    Título: Tarefa 2 - 1 Comezando con PHP

    Autor: Nome da persoa que modifica a páxina.

    Data modificación: Data na que se modificou por última vez o documento

    Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/
//Exercicio 01.Strings
    //Enderezo
        //Creo a variable cun enderezo electrónico 
        $direccion = "unexemplo@gmail.com";
        //Uso de strpos para devolver a posicion numerica da primeira aparición do caracter
        $validar = strpos($direccion,"@");

    //Cadea de texto
        $cadena = 'I feel stupid and contagious ,Here we are now, entertain us ,A mulatto, an albino,A mosquito, my libido';
        $letras = ['a','e','i','o'];
        $numero = [4,3,1,0];
//Exercicio 02.Datas
        //Copyright
        $fecha_actual = date('Y');
        //formato dd/mm/aaaa co dia da semana e o mes en letra
        $formato1 = date("D , d M Y");
        //Indicar cantas semanas pasaron dende o 6 de xaneiro á data actual
        $fecha1 = time();
        $fecha2 = strtotime("1-1-2024");
        //Funcion venres()
        $data = date("D");

        function venres($data){
            if ($data == "Fri"){
                return true;
            }else{
                return false;
            }
        }

//Exercicio 03.Condicionais
        //Funcion saudar()
        $hora = date("H");
        function saudar(String $hora){
            strtotime($hora);
                switch($hora){
                    case ($hora >= 6 && $hora < 12):{
                        return 'Bos dias';
                        
                    }
                    case ($hora >= 12 && $hora <20):{
                        return 'Boas tardes';
                        
                    }
                    case ($hora >= 20 && $hora < 22):{
                        return 'Boas noites';
                        
                    }
                    case ($hora >= 22):{
                        return 'pasa pa cama';

                    }    

                    default:
                    return 'Error';
                }
        }
        //Funcion contarLetras()
        $texto ="nove";
        
        function contarLetras($texto) {
        $valorA = 0;
        $valorE = 0;
        $valorI = 0;
        $valorO = 0;
        $valorU = 0;
        $contadorOtros = 0;
        $contadorNumeros = 0;
        for ($i =0;$i<strlen($texto);$i++){
            switch($texto[$i]){
                case "a":
                      $valorA++;
                      break;
                case "e":
                      $valorE++;
                      break;
                case "i":
                      $valorI++;
                      break;
                case "o":
                     $valorO++;
                     break;
                case "u":
                    $valorU++;
                    break;
                case $texto[$i]>= 0 && $texto[$i] <= 9:
                    $contadorNumeros++;
                    break; 
                default:
                      $contadorOtros++ ;
                      break;
            }
        }
        return " a: ".$valorA." e: ".$valorE." i: ".$valorI." o:".$valorO." u: ".$valorU." Numeros: ".$contadorNumeros;
    }
//Exercicio 04.Bucles
$base = 8;
$exponente = 4;

function pontencias(int $base , int $exponente){
    for($i = 1; $i <= $exponente; $i++){
        echo $base . "^" . $i . " = " . pow($base, $i) . "<br>";
    }
}
    //Averiguar contraseña
    $contrasena = "0019";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <?php
        //Exercicio 01.Strings
            //Validar direccion e escribir a conta e o dominio
            if($validar > 0){
                echo "A conta: " . $direccion . " con nome: " . substr($direccion,0,$validar ) .  " con dominio " . substr($direccion,$validar) . " e correcto " ;
            }else{
                echo "Non é un enderezo válido";
            }
        
            //Cadena de texto
            echo "<p>" . str_ireplace($letras, $numero,$cadena) . "</p>";
        ?>   
        <!--Exercicio 02.Datas-->
            <!--Fecha dd/mm/aaaa co dia da semana e o mes en letra-->
            <p>Hoxe e día: <?php echo $formato1 ?></p>
            <!--Semanas transcurridas-->
            <p>Pasaron <?php echo floor(($fecha1 - $fecha2)/(60 * 60 * 24 * 7))?> semanas</p>
            <!--Se o dia e venres: -->
            <p>¿Es viernes? : <?php 
            if(venres($data)){
                echo "¡Es viernes!";
            }else{
                echo "No es viernes";
            }
            ?></p>

        <!--Exercicio 03.Condicionais-->
            <!--Funcion saudar-->
            <p><?php 
            echo saudar($hora);
            ?></p>
        <!--Funcion contarLetras-->
        <p>
        <?php 
            echo contarLetras($texto);
        ?>
        </p>
        <!--Exercicio 04.Bucles-->
            <p>
                <?php 
                    echo pontencias($base,$exponente);
                ?>
            </p>
            <!--Encontrar el ping-->
            <?php 
                for($i = "0000";$i <= $contrasena;$i++){
                    if($i == $contrasena){
                        echo "La contraseña es: " . str_pad($i, 4, '0', STR_PAD_LEFT);
                    }
                }
            ?>

            <!--Variable superglobal-->
                
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Valor</th>
                </tr>
                <?php 
                    $_ENV = getenv();
                   foreach ($_ENV as $clave => $valor) {
                    if($clave == "PATH"){
                        echo "<tr>
                            <td><strong>".$clave."</strong></td>
                            <td>".$valor."</td>
                            </tr>";  
                    }elseif($clave =="LANG"){
                        echo "<tr>
                            <td><strong>".$clave."</strong></td>
                            <td>".$valor."</td>
                            </tr>"; 
                    }else{
                        echo "<tr>
                            <td>".$clave."</td>
                            <td>".$valor."</td>
                            </tr>";  
                    }   
                   }
                   
                ?>
                </table>
        <!--Exercicio 02.Datas-->
        <footer>
            <p> &copy; <?php echo $fecha_actual?> por Bruno Couceiro Sande</p>
        </footer>
    </body>
</html>


