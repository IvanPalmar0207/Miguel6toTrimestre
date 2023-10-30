<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta Datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!--Estilos de la pagina-->
    <link rel="stylesheet" href="../css/usuarioClass.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la Pestaña-->
    <title>Visualizacion Datos</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">Visualizacion de Datos - Hotel Pegasus</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Opciones-->
    <ul>
        <li>
            <a href="../index.php">Inicio</a>
        </li>
    </ul>
<?php

require_once('usuarioClass.php');

$usuario = new Usuario();
$usuario->mostrarClientes();

?>

<!--Pie de Pagina-->
<footer>
    <div class="contenedorFooter">
        <img src="../img/hotel.png" alt="hotelIcono">
        <h3>Hotel Pegasus</h3>
    </div>
</footer>