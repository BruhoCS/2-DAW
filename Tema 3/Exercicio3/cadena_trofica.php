<?php
/*

    Título: Tarefa 3 -3  Cadena trofica

    Autor: Bruno Couceiro Sande.

    Data modificación: 8/10/2024

    Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadea trofica</title>
</head>
<body>
    <?php 
    //Array que conten aos herbivoros
        $herbivoros=["🐄","🐖","🐀","🐐","🦃","🐌","🦆"];

    //Array que conten os carnivoros
        $carnivoros=["🐺","🦅","🐍"];

    //Array de detrívoros
        $detrivoros =["🐛","🦀"];

    //Carnivoros se comen entre si mas a herviboros
        $animalesMixto =array_merge($herbivoros, $carnivoros,$detrivoros);

    //Array de comer
        $comer =["🐺" =>["🐄","🐖","🐐","🦅","🐍"],"🦅"=>["🦃","🦆","🐍","🦀"],"🐍"=>["🐀","🐌","🦅","🦀"],"🦀"=>["🐛","🐌"]];

    //Mostrar carnivoros
    echo "Carnivoros: <br>";
    foreach($carnivoros as $i){
        echo $i;
    }

    echo "<br>";

    //Mostrar herviboros
    echo "Herviboros: <br>";
    foreach($herbivoros as $j){
            echo $j;
    }
    
    echo " <br> RESULTADO: <br>";
    //buscar un carnivoro 
    $car = array_rand($carnivoros);
    $carnivoro = $carnivoros[$car];
    

    //Array de los que puede comer el carnivoro
    $indiceCar = $comer[$carnivoro];

    //Buscar herviboro
    $her = array_rand($herbivoros);
    $herbivoro = $herbivoros[$her];
    
    //Animales mixtos
    $mixA = array_rand($animalesMixto);
    $mixto = $animalesMixto[$mixA];

    //Mostrar quien come a quien
    function animalCome($indiceCar,$mixto,$carnivoro){

        //Condicion para saber si come o no come a 
        if(in_array($mixto,$indiceCar)){
            echo $carnivoro." come a: ".$mixto;
        }else{
            echo $carnivoro." no come a: ".$mixto;
        }

    }   

    animalCome($indiceCar,$mixto,$carnivoro); 

    ?>
</body>
</html>