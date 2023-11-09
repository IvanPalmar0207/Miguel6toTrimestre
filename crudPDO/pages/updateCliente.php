<?php

require_once('Conexion.php');
require_once('usuarioClass.php');

$numeroDocumento_cli1 = $_GET['numeroDocumento_cli'];


$seleccionarUno = Conexion::conexion()->query('SELECT * FROM tb_clientes INNER JOIN tb_rol ON tb_clientes.codigo_rl = tb_rol.codigo_rl WHERE numeroDocumento_cli ='. $numeroDocumento_cli1);

$seleccionarUno->setFetchMode(PDO::FETCH_ASSOC);

$seleccionarUno->execute();

while($fila = $seleccionarUno->fetch()){

    $columna1 = $fila['numeroDocumento_cli'];
    $columna2 = $fila['correoElectronico_cli'];
    $columna3 = $fila['nombres_cli'];
    $columna4 = $fila['apellidos_cli'];
    $columna5 = $fila['tipo_rl'];
    $columna6 = $fila['contrasena_cli'];
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
    <link rel="stylesheet" href="../css/updateCliente.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la Pestaña-->
    <title>ACTUALIZAR PEGASUS</title>
</head>

<body>
    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">Actualizar - Hotel Pegasus</h1>
        <div class="logoIzquierdo">
            <img src="../img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Formulario de registro-->
    <section class="formRegistro">
        <form class="container contenedor" method="POST">
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
                <label for="nombres_cli">Nombres del usuario:</label>
                <input type="text" name="nombre_cli" id="nombre_cli" value="<?php echo $columna3;?>" required>
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

    $correoElectronico_cli = $_POST['email'];
    $nombres_cli = $_POST['nombre_cli'];
    $apellidos_cli = $_POST['apellido'];
    $rol_cli = $_POST['rol'];
    $contrasena_cli = $_POST['contrasena'];
    
    $contrasena_cli = password_hash($contrasena_cli,PASSWORD_DEFAULT,array('password' =>7));

    $sql = 'UPDATE tb_clientes SET correoElectronico_cli = :correo, nombres_cli = :nombre, apellidos_cli = :apellidos, rol_cli = :rol, contrasena_cli = :contrasena  WHERE numeroDocumento_cli = "'.$columna1.'"';
        
    $resultado = Conexion::conexion()->prepare($sql);
    
    $resultado->bindParam(':correo',$correoElectronico_cli);
    $resultado->bindParam(':nombre',$nombres_cli);
    $resultado->bindParam(':apellidos',$apellidos_cli);
    $resultado->bindParam(':rol',$rol_cli);
    $resultado->bindParam(':contrasena',$contrasena_cli);
    
    $resultado->execute();

    echo "<script type='text/javascript'>
        alert('El usuario ha sido actualizado correctamente...');
        window.location = './mostrarCliente.php';
    </script>";    
    
}    

?>