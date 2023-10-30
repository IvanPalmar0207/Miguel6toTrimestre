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
    <link rel="stylesheet" href="../css/iniciarSesion.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la Pestaña-->
    <title>INICIAR SESION - PEGASUS</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">Iniciar Sesion - Hotel Pegasus</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Barra de navegacion-->
    <div class="contenedorEnlaces">
        <ul>
            <li><a href="../index.php">Volver</a></li>
        </ul>
    </div>


    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post">
            <div class="campo">
                <label for="numeroDoc">Numero de Documento:</label>
                <input type="text" name="numeroDoc" id="numeroDoc" required>
            </div>
            <br>

            <div class="campo">
                <label for="email">Correo Electronico:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <br>

            <div class="campo">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>

            <br>

            <div class="campo">
                <label for="confirmarContrasena">Confimar contraseña:</label>
                <input type="password" name="confirmarContrasena" id="confirmarContrasena" required>
            </div>

            <br>

            <input class="boton" type="submit" value="Iniciar Sesion">
            <br>
            <a href="./registrarCliente.php">No tienes cuenta?</a>
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

require_once('Conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numeroDocumento_cli1 = $_POST['numeroDoc'];
    $correoElectronico_cli = $_POST['email'];
    $contrasena_cli = $_POST['contrasena'];
    $confirmarContrasena_cli = $_POST['confirmarContrasena'];

    if($contrasena_cli == $confirmarContrasena_cli){

        $seleccionarUno = Conexion::conexion()->query('SELECT * FROM tb_clientes WHERE numeroDocumento_cli = '. $numeroDocumento_cli1);

        $seleccionarUno->setFetchMode(PDO::FETCH_ASSOC);

        $seleccionarUno->execute();

        while($fila = $seleccionarUno->fetch()){
            $columna1 = $fila['numeroDocumento_cli'];
            $columna2 = $fila['correoElectronico_cli'];
            $columna3 = $fila['contrasena_cli'];
        }

        $verificacionContrasena = password_verify($contrasena_cli,$columna3);

        if($numeroDocumento_cli1==$columna1 && $correoElectronico_cli == $columna2 && $verificacionContrasena){
            $_SESSION = True;
            echo "<script type='text/javascript'>
                alert('Bienvenido al Hotel Pegasus');
                window.location = './paginaPrincipal.php';
            </script>";
        }else{
            echo "<script type='text/javascript'>
                alert('Alguno de los campos es incorrecto. Intenta nuevamente');
            </script>";
        }
    }else{
        echo "<script type='text/javascript'>
                alert('Las contraseña no coincide, intenta nuevamente...');
            </script>";
    }

}
?>