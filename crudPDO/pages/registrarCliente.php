<?php

require_once('Conexion.php');

$sql = 'SELECT * FROM tb_tipodocumento';
$selecionarTipoDoc = Conexion::conexion()->prepare($sql);
$selecionarTipoDoc->setFetchMode(PDO::FETCH_ASSOC);
$selecionarTipoDoc->execute();

$sql1 = 'SELECT * FROM tb_rol';
$selecionarRol = Conexion::conexion()->prepare($sql1);
$selecionarRol->setFetchMode(PDO::FETCH_ASSOC);
$selecionarRol->execute();

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
    <link rel="stylesheet" href="../css/registrarClientes.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la Pestaña-->
    <title>REGISTRARSE PEGASUS</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">Bienvenido al Hotel Pegasus</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Barra de navegacion-->
    <div class="contenedorEnlaces">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
        </ul>
    </div>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post" action="#">
            <div class="campo">
                <label for="numeroDoc">Numero de Documento:</label>
                <input type="number" name="numeroDoc" id="numeroDoc" required>
            </div>

            <br>

            <div class="campo">
                <label for="tipoDoc">Tipo de Documento:</label>
                <select class="input" name="tipoDoc" id="tipoDoc" required>
                    <?php
                    foreach($selecionarTipoDoc->fetchAll() as $columna){
                        echo "<option value=". $columna ['codigo_tpD']." >". $columna['tipo_tpD'] ."</option>";
                    }
                    ?>
                </select>
            </div>

            <br>

            <div class="campo">
                <label for="email">Correo Electronico: </label>
                <input type="email" name="email" id="email" required>
            </div>

            <br>

            <div class="campo">
                <label for="nombre">Nombres del usuario:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>

            <br>

            <div class="campo">
                <label for="apellido">Apellidos del usuario:</label>
                <input type="text" name="apellido" id="apellido" required>
            </div>

            <br>

            <div class="campo">
                <label for="rol">Rol de usuario:</label>
                <select class="input" name="rol" id="rol" required>
                    <?php
                    foreach($selecionarRol->fetchAll() as $rol){
                        echo "<option value=". $rol['codigo_rl'] .">". $rol['tipo_rl'] ."</option>";
                    }
                    ?>
                </select>
            </div>

            <br>

            <div class="campo">
                <label for="contrasena">Contraseña del usuario:</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>

            <br>

            <input class="boton" type="submit" value="Registrarse">
            <br>
            <a href="./iniciarSesion.php">Ya tienes cuenta?</a>
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
require_once('usuarioClass.php');

//Variables de Recibimiento

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $numeroDocumento_cli = $_POST['numeroDoc'];
    $tipoDocumento_cli = $_POST['tipoDoc'];
    $correoElectronico_cli = $_POST['email'];
    $nombres_cli = $_POST['nombre'];
    $apellidos_cli = $_POST['apellido'];
    $rol_cli = $_POST['rol'];
    $contrasena_cli = $_POST['contrasena'];
    try{
        $contrasena_cli = password_hash($contrasena_cli,PASSWORD_DEFAULT,array('password' =>7));

        $clientes = new Usuario();

        $clientes->insertarDatos($numeroDocumento_cli,$tipoDocumento_cli,$correoElectronico_cli,$nombres_cli,$apellidos_cli,$rol_cli,$contrasena_cli);

        echo "<script type='text/javascript'>
                alert('El usuario ha sido registrado correctamente...');
                window.location = './iniciarSesion.php';
            </script>";

        unset($clientes);
    }
    catch(Exception $e){
        echo "<script type='text/javascript'>
            alert('No se ha podido registrar el usuario correctamente...');
        </script>";
    }

}

?>