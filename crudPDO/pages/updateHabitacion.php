<?php

require_once('Conexion.php');
require_once('tipoHabitacionClass.php');

$codigo_tpH = $_GET['codigo_tpH'];


$seleccionarUno = Conexion::conexion()->query('SELECT * FROM tb_tipohabitacion WHERE codigo_tpH ='. $codigo_tpH);

$seleccionarUno->setFetchMode(PDO::FETCH_ASSOC);

$seleccionarUno->execute();

while($fila = $seleccionarUno->fetch()){

    $columna1 = $fila['codigo_tpH'];
    $columna2 = $fila['tipo_tpH'];
    $columna3 = $fila['precio_tpH'];
    $columna4 = $fila['cantidadDisponible_tpH'];
    $columna5 = $fila['descripcion_tpH'];
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
    <title>REGISTRO - TIPO HABITACION</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">RECEPCIONISTA</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Barra de navegacion-->
    <div class="contenedorEnlaces">
        <ul>
            <li><a href="./mostrarHabitacion.php">Inicio</a></li>
        </ul>
    </div>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post" action="#">
            <div class="campo">
                <label for="codigoHabitacion">Codigo de la habitacion:</label>
                <input type="text" name="codigoHabitacion" id="codigoHabitacion" value="<?php echo $columna1 ?>" disabled>
            </div>

            <br>

            <div class="campo">
                <label for="tipoHabitacion">Tipo de habitacion:</label>
                <input type="text" name="tipoHabitacion" id="tipoHabitacion" value="<?php echo $columna2 ?>" disabled>

            </div>

            <br>

            <div class="campo">
                <label for="precioHabitacion">Precio de la habitacion: </label>
                <input type="number" name="precioHabitacion" id="precioHabitacion" value="<?php echo $columna3 ?>">
            </div>

            <br>

            <div class="campo">
                <label for="habitacionesDisponibles">Habitaciones Disponibles:</label>
                <input type="number" name="habitacionesDisponibles" id="habitacionesDisponibles" value="<?php echo $columna4 ?>">
            </div>

            <br>

            <div class="campo">
                <label for="descripcionHabitacion">Descripcion habitacion:</label>
                <textarea name="descripcionHabitacion" id="descripcionHabitacion" cols="22" rows="2" ><?php echo $columna5 ?></textarea>
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

    $precioHabitacion = $_POST['precioHabitacion'];
    $habitacionesDisponibles = $_POST['habitacionesDisponibles'];
    $descripcionHabitacion = $_POST['descripcionHabitacion'];

    $sql = 'UPDATE tb_tipohabitacion SET precio_tpH = :precio, cantidadDisponible_tpH = :disponibles, descripcion_tpH = :descripcion WHERE codigo_tpH = "'.$columna1.'"';

    $resultado = Conexion::conexion()->prepare($sql);

    $resultado->bindParam(':precio',$precioHabitacion);
    $resultado->bindParam(':disponibles',$habitacionesDisponibles);
    $resultado->bindParam(':descripcion',$descripcionHabitacion);

    $resultado->execute();

    echo "<script type='text/javascript'>
        alert('La habitacion ha sido actualizada correctamente...');
        window.location = './mostrarHabitacion.php';
    </script>";

}

?>