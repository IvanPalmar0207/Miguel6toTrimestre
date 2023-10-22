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
        <h1 class="tituloEncabezado">Bienvenido al Hotel Pegasus</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post" action="#">
            <div class="campo">
                <label for="numeroDoc">Numero de Documento:</label>
                <input type="text" name="numeroDoc" id="numeroDoc" required>
            </div>
            <br>

            <div class="campo">
                <label for="tipoDoc">Tipo de Documento:</label>
                <select class="input" name="tipoDoc" id="tipoDoc" required>
                    <option value="vacio"></option>
                    <option value="CC">Cedula de Ciudadania</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="Permiso">Permiso de estadia</option>
                    <option value="pasaporte">Pasaporte</option>
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
                    <option value="vacio"></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Recepcionista">Recepcionista</option>
                    <option value="Mesero">Mesero</option>
                    <option value="Room Service">Room Service</option>
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
            <a href="../index.php">Ya tienes cuenta?</a>
            <br>
        </form>
    </section>

    <!--Pie de Pagina-->
    <footer>
        <div class="contenedorFooter">
            <img src="../img/hotel.png" alt="hotelIcono">
            <h3>Hotel Pegasus</h3>
        </div>
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

    $contrasena_cli = password_hash($contrasena_cli,PASSWORD_DEFAULT,array('password' =>10));

    $clientes = new Usuario();

    $clientes->insertarDatos($numeroDocumento_cli,$tipoDocumento_cli,$correoElectronico_cli,$nombres_cli,$apellidos_cli,$rol_cli,$contrasena_cli);

    echo "<script type='text/javascript'>
        alert('El usuario ha sido registrado correctamente...');
        window.location = '../index.php';
        </script>";

    unset($clientes);
}

?>