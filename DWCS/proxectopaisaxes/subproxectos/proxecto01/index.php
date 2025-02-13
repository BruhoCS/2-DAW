<?php
/*

    @Título: Proxecto Paisaxe e sustentabilidade - Subproxecto XXX
    
    @Autor: 

    @Data modificación: 08/11/2024

    @Versión 1.0 # Irá incrementándose con cada cambio/entrega.

*/

require_once('../../modelo/Usuario.class.php');
session_start();
?>
<!DOCTYPE html>
<html lang="gl">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../vista/css/app.css">

    <title>
        CIFP Rodolfo Ucha Piñeiro :: Proxecto Paisaxe e sustentabilidade
    </title>

    <style>
        /* Estilo General */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #f9f9f6;
            /* Fondo neutro */
        }

        /* Cabeceras */
        th {
            background-color: #4CA452;
            /* Verde natural */
            color: white!important;
            font-weight: bold;
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Filas y Celdas */
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        /* Sombreado Alterno */
        tr:nth-child(even) {
            background-color: #e8f5e9;
            /* Verde claro */
        }

        tr:nth-child(odd) {
            background-color: #f1f8e9;
            /* Beige */
        }

        /* Texto */
        td,
        th {
            font-size: 16px;
            color: #333;
        }

        /* Combinación de Celdas */
        td[colspan] {
            text-align: center;
            background-color: #c8e6c9;
            /* Verde pastel */
            font-style: italic;
        }
    </style>
</head>

<body>

    <?php include('../../vista/layout/cabeceira.php'); ?>

    <?php include('../../vista/layout/menu-superior.php'); ?>
    <?php include('vista/submenu.php'); ?>

    <div class="container">

        <h1>Subproxecto 1</h1>

        <table>
            <tr>
                <th>Nome da Paisaxe</th>
                <th>Ubicación</th>
                <th>Tipo de Ecosistema</th>
                <th>Puntuación de Sostenibilidade</th>
            </tr>
            <tr>
                <td>Parque Natural das Fragas do Eume</td>
                <td>Pontedeume</td>
                <td>Bosque</td>
                <td>9/10</td>
            </tr>
            <tr>
                <td>Lago de As Pontes</td>
                <td>As Pontes</td>
                <td>Húmido</td>
                <td>8/10</td>
            </tr>
            <tr>
                <td colspan="4">Nota: exemplo.</td>
            </tr>
        </table>

    </div>

    <?php include('../../vista/layout/pe.php'); ?>

</body>

</html>