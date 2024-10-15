<?php
/*

    Título: Tarefa 2 - 1 Comezando con PHP

    Autor: Bruno Couceiro Sande.

    Data modificación: 24/09/2024

    Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/
?>

<!DOCTYPE html>
<?php 
    //Constante 1º exercicio
    define("titulo","Exercicio 1") ;

    //Constante 2º exercicio
    define("BENVIDA","Benvidos") ;

    //Constante 3º exercicio
    define("PI",3.14);
    $radio1 = 20;
    $radio2 = 10.5;

    //Variable 4º exercicio
    $numero = mt_rand(1,50);
    $numero1 = mt_rand(1,50);
    $numero2 = mt_rand(1,50);
    //Decimales %d , binarios %b , hexadecimales %x

    //Variable 5º exercicio
    $cor1 = "green";
    $cor2 = "hotpink";

    //Función sexto exercicio
    $prezo = mt_rand(1,100);
   
    function calcular_o_ive($prezo , $ive=0.21): float{
        return $prezo * $ive;
    }

    //Función septimo exercicio
    $radio;
    function calcular_area($radio,$pi=3.14): float{
        return $pi * $radio * 2;
    }

    //Funcion octavo exercicio
    function calcular_desconto($prezo , $desconto = 0.10): float {
        return $prezo * $desconto;
    }
    
    //Funcion noveno exercicio
    $altura = mt_rand(1,50);
    $ancho = mt_rand(1,50);

    function calcular_rectangulo($altura,$ancho): string{
        return "La medida del area: " . $altura * $ancho . "<br>" . "Medida del perímetro: " . ($altura * 2 + $ancho * 2) ;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exercicio1.css" type="text/css">
    <title><?php echo titulo; ?> </title>
</head>
<style>
    #mod:nth-last-child(even){
        background-color:<?php echo $cor1?>;
    }
    #mod:nth-child(even){
        background-color:<?php echo $cor2?>;
    }
</style>
<body>
    <!--Primer exercicio-->
        <!--Imprime por pantalla un Titulo h1-->
    <h1><?php echo titulo; ?> </h1>

    <!--Segundo exercicio-->
        <!--Impribe por pantalla o contido da varibale "BENVIDA"-->
    <span><?php printf("(%s)",BENVIDA)?></span>

    <!--Tercer exercicio-->
        <!--Resultado 1-->
            <!--Mostra por pantalla o resultado do calculo do primer radio -->
    <h3>Numero enteiro: <?php echo number_format(PI *  $radio1 * 2 , 2)?></h3>
       
        <!--Resultado 2-->
            <!--Mostra por pantalla o resultado do calculo do segundo radio -->
    <h3>Numero real: <?php echo number_format(PI * $radio2 * 2,2 )?></h3>
    
    <!--Cuarto exercicio-->
        <!--Mostrase unha taboa na que se realiza unha conversion dos numeros-->
    <table>
        <tr>
            <th></th>
            <th>Numero1</th>
            <th>Numero2</th>
            <th>Numero3</th>
        </tr>
        <tr>
            <td> Decimal </td>
            <td><?php printf("(%d)",$numero)?></td>
            <td><?php printf("(%d)",$numero1)?></td>
            <td><?php printf("(%d)",$numero2)?></td>      
        </tr>
        <tr>
            <td> Binario </td>
            <td><?php printf("(%b)",$numero)?></td>
            <td><?php printf("(%b)",$numero1)?></td>
            <td><?php printf("(%b)",$numero2)?></td>  
        </tr>
        <tr>
            <td> Hexadecimal </td>
            <td><?php printf("(%x)",$numero)?></td>
            <td><?php printf("(%x)",$numero1)?></td>
            <td><?php printf("(%x)",$numero2)?></td>
        </tr>
    </table>

    <!--Quinto exercicio-->
        <!--Mostrase unha copia taboa na que se realiza unha conversion dos numeros e aplicase estilos css-->
    <table>
        <tr id="mod">
            <th></th>
            <th>Numero1</th>
            <th>Numero2</th>
            <th>Numero3</th>
        </tr>
        <tr id="mod">
            <td> Decimal </td>
            <td><?php printf("(%d)",$numero)?></td>
            <td><?php printf("(%d)",$numero1)?></td>
            <td><?php printf("(%d)",$numero2)?></td>      
        </tr>
        <tr id="mod">
            <td> Binario </td>
            <td><?php printf("(%b)",$numero)?></td>
            <td><?php printf("(%b)",$numero1)?></td>
            <td><?php printf("(%b)",$numero2)?></td>  
        </tr>
        <tr id="mod">
            <td> Hexadecimal </td>
            <td><?php printf("(%x)",$numero)?></td>
            <td><?php printf("(%x)",$numero1)?></td>
            <td><?php printf("(%x)",$numero2)?></td>
        </tr>
    </table>

    <!--Sexto exercicio-->
        <!--Mostrase o calculo do % correspondete en cada caso-->
    <p>Iva do 21%: <?php echo calcular_o_ive($prezo,$ive=0.21)?></p>
     <!--Uso var_dump-->
        <!--Uso de var_dump para indicar el valor y tipo de la varible y uso del die que funciona como exit,todo el codigo a continuación no se ejecutará-->
        <?php /*echo var_dump($prezo,$ive); die(); */?>

    <p>Iva do 4%: <?php echo calcular_o_ive($prezo,$ive=0.04)?></p>


    <!--Septimo exercicio-->
        <!--Imprime por pantalla os diferentes resultados da medida do radio segun sexa o seu valor-->
    <p>O radio con valor real do circulo é: <?php echo calcular_area($radio=50.4 , $pi=3.14)?></p>
    <p>O radio con valor null do circulo é: <?php echo calcular_area($radio=null , $pi=3.14)?></p>
    <p>O radio con valor enteiro do circulo é: <?php echo calcular_area($radio=70 , $pi=3.14)?></p>

    <!--Octavo exercicio-->
        <!--Calculase o ive mais o desconto aplicados a un prezo-->
    <p> <?php echo "prezo final: " . number_format(calcular_o_ive(calcular_desconto($prezo,$desconto=0.10) , $ive=0.21) , 2) .  "$" ?>
    </p>

    <!--Noveno exercicio-->
        <!--Calculase o area e o perimetro dun rectangulo-->
    <?php echo calcular_rectangulo($altura , $ancho)?>  
        <!--Uso de var_dump-->
        <?php /*echo var_dump($altura,$ancho); die(); */?>  

</body>
</html>