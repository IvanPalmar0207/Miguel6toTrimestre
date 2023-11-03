<?php

require_once('Conexion.php');
require_once('reservarClass.php');
require_once('reservaHabitacionClass.php');

$sql = 'SELECT * FROM tb_tipohabitacion';
$mostrarHabitacion = Conexion::conexion()->prepare($sql);
$mostrarHabitacion->setFetchMode(PDO::FETCH_ASSOC);
$mostrarHabitacion->execute();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta Datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN deBootStrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--CDN de los iconos de BootStrap 5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--Estilos de la pagina-->
    <link rel="stylesheet" href="../css/reservar.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la Pestaña-->
    <title>RESERVAR PEGASUS</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">RESERVAR EN PEGASUS</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Barra de navegacion-->
    <div class="contenedorEnlaces">
        <ul>
            <li><a href="./paginaPrincipal.php">Inicio</a></li>
        </ul>
        <ul>
            <li><a href="./validacionReserva.php">Mis Reservas</a></li>
        </ul>
    </div>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post" action="#">

            <div class="campo">
                <label for="codigoRes">Codigo de la reserva:</label>
                <input type="number" name="codigoRes" id="codigoRes" required>
            </div>

            <br>

            <div class="campo">
                <label for="numeroDoc">Numero de Documento:</label>
                <input type="number" name="numeroDoc" id="numeroDoc" required>
            </div>

            <br>

            <div class="campo">
                <label for="fechaLlegada">Fecha de Llegada:</label>
                <input type="date" name="fechaLlegada" id="fechaLlegada">
            </div>

            <br>

            <div class="campo">
                <label for="fechaSalida">Fecha de Salida:</label>
                <input type="date" name="fechaSalida" id="fechaSalida">
            </div>

            <br>

            <div class="campo">
                <label for="cantidadJovenes">Cantidad de Jovenes:</label>
                <input type="number" name="cantidadJovenes" id="cantidadJovenes">
            </div>

            <br>

            <div class="campo">
                <label for="cantidadAdultos">Cantidad de Adultos:</label>
                <input type="number" name="cantidadAdultos" id="cantidadAdultos">
            </div>

            <br>

            <div class="campo">
                <label for="tipoHabitacion">Tipo de Habitacion:</label>
                <select class="input" name="tipoHabitacion" id="tipoHabitacion" required>
                <?php
                foreach($mostrarHabitacion->fetchAll() as $columna){
                    echo "<option value=". $columna['codigo_tpH'] .">".$columna['tipo_tpH'] ." </option>";
                }
                ?>
                </select>
            </div>

            <br>

            <input class="boton" type="submit" value="Reservar">
            <br>
            <a href="./paginaPrincipal.php">No reservar?</a>
            <br>
        </form>
    </section>

     <!--Footer y las redes sociales-->
     <footer class="d-flex flex-column align-items-center justify-content-center">
        <p class="footer-texto text-center">El SENA quiere brindarte la mejor estadia.
            <br>Ven, comparte y disfruta en nuestro Hotel.</p>
        <div class="iconos-redes-sociales d-flex flex-wrap align-items-center justify-content-center">
            <a href="https://web.facebook.com/sena.soacha/?locale=es_LA&_rdc=1&_rdr" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://twitter.com/SENASoacha?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://senasoachacide.blogspot.com/" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-mortarboard-fill"></i>
            </a>
            <a href="mailto:servicioalciudadano@sena.edu.co " target="_blank" rel="noopener noreferrer">
                <i class="bi bi-envelope"></i>
            </a>
        </div>
        <div class="derechos-de-autor">Creado por: Ivan David Palmar Martinez&#169;</div>
    </footer>

</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $codigoRes = $_POST['codigoRes'];
    $numeroDocumento_cli = $_POST['numeroDoc'];
    $fechaLlegada = $_POST['fechaLlegada'];
    $fechaSalida = $_POST['fechaSalida'];
    $cantidadJovenes = $_POST['cantidadJovenes'];
    $cantidadAdultos = $_POST['cantidadAdultos'];
    $tipoHabitacion = $_POST['tipoHabitacion'];

    try{
        $reserva = new Reserva;
        $reserva->insertarReserva($codigoRes,$numeroDocumento_cli,$fechaLlegada,$fechaSalida,$cantidadJovenes,$cantidadAdultos);

        $sql = 'SELECT * FROM tb_reserva WHERE numeroDoc_cli = '. $numeroDocumento_cli;
        $seleccionarReserva = Conexion::conexion()->prepare($sql);
        $seleccionarReserva->setFetchMode(PDO::FETCH_ASSOC);
        $seleccionarReserva->execute();


        $reservaHabitacion = new ReservaHabitacion;

        $reservaHabitacion->insertarReservaHabitacion($codigoRes,$tipoHabitacion);

        echo "<script type='text/javascript'>
            alert('La reserva ha sido agenda, gracias por la confianza');
            window.location = './paginaPrincipal.php';
        </script>";

    }catch(Exception $e){
        echo "<script type='text/javascript'>
            alert('La reserva ha sido agenda, gracias por la confianza');
        </script>";
    }
}

?>