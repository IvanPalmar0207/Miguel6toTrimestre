<?php

require_once('Conexion.php');
require_once('usuarioClass.php');

$numeroDocumento_cli1 = $_GET['numeroDocumento'];


$seleccionarUno = Conexion::conexion()->query('SELECT * FROM tb_clientes WHERE numeroDocumento_cli ='. $numeroDocumento_cli1);

$seleccionarUno->setFetchMode(PDO::FETCH_ASSOC);

$seleccionarUno->execute();

while($fila = $seleccionarUno->fetch()){    

    $columna1 = $fila['numeroDocumento_cli'];
    $columna2 = $fila['correoElectronico_cli'];
    $columna3 = $fila['nombres_cli'];
    $columna4 = $fila['apellidos_cli'];
    $columna5 = $fila['rol_cli'];
    $columna6 = $fila['contrasena_cli'];

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
        <h1 class="tituloEncabezado">ACTUALIZACION - Hotel Pegasus</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="post" action="#">
            <div class="campo">
                <label for="numeroDoc">Numero de Documento:</label>
                <input type="text" name="numeroDoc" id="numeroDoc" disabled value="<?php echo $columna1; ?>" required>
            </div>

            <br>

            <div class="campo">
                <label for="email">Correo Electronico: </label>
                <input type="email" name="email" id="email" value="<?php echo $columna2;?>" required>
            </div>

            <br>

            <div class="campo">
                <label for="nombre">Nombres del usuario:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $columna3;?>" required>
            </div>

            <br>

            <div class="campo">
                <label for="apellido">Apellidos del usuario:</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $columna4; ?>" required>
            </div>

            <br>

            <div class="campo">
                <label for="rol">Rol de usuario:</label>
                <select class="input" name="rol" id="rol" required>
                    <option value="<?php echo $columna5;?>"><?php echo $columna5;?></option>
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
                <input type="password" name="contrasena" id="contrasena" value="<?php echo $columna6 ?>" required>
            </div>

            <br>

            <input class="boton" type="submit" value="Actualizar">
            <br>
            <a href="mostrarCliente.php">Volver?</a>
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
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $correoElectronico_cli = $_POST['email'];
    $nombres_cli = $_POST['nombre'];
    $apellidos_cli = $_POST['apellido'];
    $rol_cli = $_POST['rol'];
    $contrasena_cli = $_POST['contrasena'];  

    $usuario = new Usuario();

    $usuario->actualizarCliente($numeroDocumento_cli1, $correoElectronico_cli, $nombres_cli, $apellidos_cli, $rol_cli, $contrasena_cli);
    header('../../index.php'); 
}    


?>