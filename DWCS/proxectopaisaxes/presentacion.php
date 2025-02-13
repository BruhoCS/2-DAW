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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="vista/css/app.css">

    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade
    </title>
</head>

<body id="presentacion">

    <?php include('vista/layout/cabeceira.php'); ?>

    <?php include('vista/layout/menu-superior.php'); ?>

    <section>
        <div class="container">
            <div>
                <h1>Innovación</h1>
                <p>Durante o curso 2024/2025 os alumnos e alumnas de segundo do ciclo de desenvolvemento de aplicacións web (DAW) do
                    <a href="https://cifprodolfoucha.es" target="_blank">CIFP Rodolfo Ucha Piñeiro</a>
                    participan no <a href="https://www.edu.xunta.gal/portal/node/6190" target="_blank">Proxecto Paisaxe e sustentabilidade </a> dentro da iniciativa de innovación educativa
                    <a href="https://www.edu.xunta.gal/portal/planproxecta" target="_blank">Plan Proxecta</a>. <br><br>
                    O obxectivo principal é fomentar o traballo cooperativo, interdisciplinar e competencial pero en temáticas comprometidas coa consecución
                    dos obxectivos de desenvolvemento sostible da Axenda 2030.
                </p>
            </div>

            <div>
                <h1>Programa Paisaxe e sustentabilidade </h1>
                <p>
                    Este programa ten como obxectivo desenvolver coñecementos e recursos para comprender e interpretar as paisaxes próximas e cotiás a través dos seus elementos constitutivos, da súa diversidade e do seu valor cultural e simbólico, para desenvolver unha actitude responsable no marco da sustentabilidade e para desenvolver propostas que melloren a súa calidade.
                </p>
                <h2>Obxectivos</h2>
                <ul>
                    <li>Desenvolver a comprensión da paisaxe onde vive o alumnado a través do recoñecemento dos seus elementos constitutivos, diversidade natural, cultural, o valor simbólico e a importancia da preservación do territorio e da paisaxe.</li>
                    <li>Fomentar o estudo e a análise interdisciplinaria da paisaxe, relacionando os coñecementos curriculares das diferentes materias para que poña en marcha propostas innovadoras que desenvolvan a capacidade interpretativa sobre os espazos próximos e cotiáns.</li>
                    <li>Implementar pequenos proxectos de estudo, interpretación e intervención na contorna próxima que, liderados polo alumnado, incorporen a paisaxe como obxecto de aprendizaxe e constitúan unha mellora para a súa posta en valor.</li>
                    <li>Empregar ferramentas gráficas que permitan representar o espazo: cartografía, fotografía, audiovisual.
                        Potenciar o traballo en equipo e a iniciativa persoal, coordinada co profesorado e integrando a participación da comunidade escolar e local no desenvolvemento do proxecto (pais, veciños etc.) e difundir na rede os mellores proxectos.</li>
                </ul>
            </div>

            <div>
                <h1>Ferramentas, recursos e actividades con fins educativos</h1>
                <p>
                    O alumnado do ciclo contribúe elaborando diferentes recursos educativos en contorno web para dar a coñecer as paisaxes da comarca de Ferrol, próximas ao noso centro e concienciar acerca da importancia do seu coidado a través da participación activa e colaborativa facendo fincapé na súa sustentabilidade.
                    </p><p> As contribucións dos estudantes son moi variadas incorporando dende fichas informativas con elementos de patrimonio histórico, cultural e natural,
                    xogos e actividades educativas ou formularios e funcionalidades de xestión que axuden á labor do Proxecto Ríos e como recursos educativos para que empregue alumnado de infantil, primaria, ESO, Bacharelato ou outros ciclos formativos.
                </p>
            </div>
        </div>
    </section>

    <?php include('vista/layout/pe.php'); ?>

</body>

</html>