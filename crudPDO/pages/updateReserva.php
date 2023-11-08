<?php

require_once('Conexion.php');
require_once('reservarClass.php');

$codigo_res = $_GET['codigo_res'];


$seleccionarUno = Conexion::conexion()->prepare('SELECT * FROM tb_reserva WHERE codigo_res ='. $codigo_res);

$seleccionarUno->setFetchMode(PDO::FETCH_ASSOC);

$seleccionarUno->execute();

while($fila = $seleccionarUno->fetch()){

    $columna1 = $fila['codigo_res'];
    $columna2 = $fila['numeroDoc_cli'];
    $columna3 = $fila['fechaInicio'];
    $columna4 = $fila['fechaSalida'];
    $columna5 = $fila['cantidadJovenes'];
    $columna6 = $fila['cantidadAultos'];
}
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
    <link rel="stylesheet" href="../css/updateHabitacion.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la Pestaña-->
    <title>ACTUALIZAR RESERVA</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">Actualizar Reserva</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Barra de navegacion-->
    <div class="contenedorEnlaces">
        <ul>
            <li><a href="./mostrarReserva.php">Inicio</a></li>
        </ul>
    </div>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post" action="#">
            <div class="campo">
                <label for="codigo_res">Codigo de la reserva:</label>
                <input type="text" name="codigo_res" id="codigo_res" value="<?php echo $columna1 ?>" disabled>
            </div>

            <br>

            <div class="campo">
                <label for="numeroDoc_cli">Numero de documento:</label>
                <input type="text" name="numeroDoc_cli" id="numeroDoc_cli" value="<?php echo $columna2 ?>" disabled>

            </div>

            <br>

            <div class="campo">
                <label for="fechaInicio">Fecha de inicio: </label>
                <input type="date" name="fechaInicio" id="fechaInicio" value="<?php echo $columna3 ?>">
            </div>

            <br>

            <div class="campo">
                <label for="fechaSalida">Fecha de salida:</label>
                <input type="date" name="fechaSalida" id="fechaSalida" value="<?php echo $columna4 ?>">
            </div>

            <br>

            <div class="campo">
                <label for="cantidadJovenes">Cantidad de jovenes:</label>
                <input type="number" name="cantidadJovenes" id="cantidadJovenes" value="<?php echo $columna5 ?>">
            </div>

            <br>

            <div class="campo">
                <label for="cantidadAdultos">Cantidad de adultos:</label>
                <input type="number" name="cantidadAdultos" id="cantidadAdultos" value="<?php echo $columna6 ?>">
            </div>

            <br>

            <input class="boton" type="submit" value="Actualizar">

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

    $fechaInicio = $_POST['fechaInicio'];
    $fechaSalida = $_POST['fechaSalida'];
    $cantidadJovenes = $_POST['cantidadJovenes'];
    $cantidadAdultos = $_POST['cantidadAdultos'];

    $sql = 'UPDATE tb_reserva SET fechaInicio = :fechaInicio, fechaSalida = :fechaSalida, cantidadJovenes = :cantidadJovenes, cantidadAultos :cantidadAdultos WHERE codigo_res = "'.$columna1.'"';

    $resultado = Conexion::conexion()->prepare($sql);

    $resultado->bindParam(':fechaInicio',$fechaInicio);
    $resultado->bindParam(':fechaSalida',$fechaSalida);
    $resultado->bindParam(':cantidadJovenes',$cantidadJovenes);
    $resultado->bindParam(':cantidadAdultos',$cantidadAdultos);

    $resultado->execute();

    echo "<script type='text/javascript'>
        alert('La reserva ha sido actualizada correctamente...');
        window.location = 'mostrarReserva.php';
    </script>";

}

?>