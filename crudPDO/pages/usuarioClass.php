<?php

require_once('Conexion.php');

class Usuario{
    public function __construct(){

    }

    public function insertarDatos(string $numeroDocumento_cli, string $tipoDocumento_cli, string $correoElectronico_cli, string $nombres_cli, string $apellidos_cli, string $rol_cli, string $contrasena_cli){
        $insercionClientes = Conexion::conexion()->prepare('INSERT INTO tb_clientes VALUES (?,?,?,?,?,?,?)');

        $insercionClientes->bindParam(1,$numeroDocumento_cli);
        $insercionClientes->bindParam(2,$tipoDocumento_cli);
        $insercionClientes->bindParam(3,$correoElectronico_cli);
        $insercionClientes->bindParam(4,$nombres_cli);
        $insercionClientes->bindParam(5,$apellidos_cli);
        $insercionClientes->bindParam(6,$rol_cli);
        $insercionClientes->bindParam(7,$contrasena_cli);

        $insercionClientes->execute();
    }

    public function mostrarClientes(){

        $mostrarDatos = Conexion::conexion()->query('SELECT * FROM tb_clientes');        

        $mostrarDatos->setFetchMode(PDO::FETCH_ASSOC);

        $mostrarDatos->execute();

        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/usuarioClass.css">
        <table class="table">
            <thead class="table-info">                
                    <tr>
                        <th scope='col'>Numero de Documento</th>
                        <th scope='col'>Tipo de Documento</th>
                        <th scope='col'>Correo Electronico</th>
                        <th scope='col'>Nombres del Usuario</th>
                        <th scope='col'>Apellidos del Usuario</th>
                        <th scope='col'>Rol del Usuario</th>
                        <th scope='col'>Contraseña del usuario</th>
                        <th scope='col'>Actualizar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
            </thead>
            <?php while ($fila = $mostrarDatos->fetch()){?>
                <tr>
                    <td><?php echo $fila['numeroDocumento_cli'];?></td>
                    <td><?php echo $fila['tipoDocumento_cli'];?></td>
                    <td><?php echo $fila['correoElectronico_cli'];?></td>
                    <td><?php echo $fila['nombres_cli'];?></td>
                    <td><?php echo $fila['apellidos_cli'];?></td>
                    <td><?php echo $fila['rol_cli']?></td>
                    <td><?php echo $fila['contrasena_cli']?></td>                    
                    <td>
                        <a href="updateCliente.php=<?php echo $fila['numeroDocumento_cli'] ?>"><img src="../img/actualizar.png" alt="imagenActualizar" width="30px" ></a>
                    </td>
                    <td>
                        <a href="eliminarCliente.php?numeroDocumento_cli=<?php echo $fila['numeroDocumento_cli'] ?>"><img src="../img/eliminar.png" alt="imagenEliminar" width='30px'></a>                
                    </td>
                </tr>

                <?php } ?>
        </table>

        <?php
    }

    public function eliminarCliente($numeroDocumento_cli){
        $sql= 'DELETE FROM tb_clientes WHERE numeroDocumento_cli='. $numeroDocumento_cli;
        Conexion::conexion()->query($sql)->execute();        
        echo "<script type='text/javascript'>
                alert('El usuario ha sido eliminado correctamente...');
                window.location = '../index.php';
        </script>";    
    }

    public function actualizarCliente($numeroCliente_cli){
        $sql = 'SELECT * FROM tb_clientes WHERE numeroDocumento_cli = "$numeroCliente_cli"';
        $seleccionarUno = Conexion::conexion()->query($sql);
        $seleccionarUno->setFetchMode(PDO::FETCH_ASSOC);
        $seleccionarUno->execute();
        
        while($fila = $seleccionarUno->fetch()){

            $numeroDocumento_cli = $fila['numeroDocumento_cli'];
            $correoElectronico_cli = $fila['correoElectronico_cli'];
            $nombres_cli = $fila['nombres_cli'];
            $apellidos_cli = $fila['apellidos_cli'];
            $rol_cli = $fila['rol_cli'];
            $contrasena_cli = $fila['contrasena_cli'];    
    ?>

        <!--CDN deBootStrap 5-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!--Estilos de la pagina-->
        <link rel="stylesheet" href="../css/registrarClientes.css">
        <!--Icono de la pestaña-->
        <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">

        <body>
    <!--Encabezado de la pagina-->
        <header>
            <h1 class="tituloEncabezado">Actualizacion - Hotel Pegasus</h1>
            <div class="logoIzquierdo">
                <img src="../img/playa.png" alt="logoIzquierda">
            </div>
        </header>

        <!--Formulario de registro-->
        <section class="formRegistro">
            <form class="container contenedor" method="post">
                <div class="campo">
                    <label for="numeroDocumento">Numero de Documento:</label>
                    <input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo $fila['numeroDocumento_cli']; ?>" disabled required>
                </div>

                <br>

                <div class="campo">
                    <label for="email">Correo Electronico: </label>
                    <input type="email" name="email" id="email" value="<?php echo $fila['correoElectronico_cli']; ?>" required>
                </div>

                <br>

                <div class="campo">
                    <label for="nombre">Nombres del usuario:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombres_cli']; ?>" required>
                </div>

                <br>

                <div class="campo">
                    <label for="apellido">Apellidos del usuario:</label>
                    <input type="text" name="apellido" id="apellido" value="<?php echo $fila['apellidos_cli']?>" required>
                </div>            
            
                <br>

                
                <div class="campo">
                    <label for="rol">Rol de usuario:</label>
                    <select class="input" name="rol" id="rol"required>
                        <option value='<?php echo $fila['rol_cli']?>'><?php echo $fila['rol_cli']?></option>
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
                    <input type="password" name="contrasena" id="contrasena" value="<?php echo $fila['contrasena_cli'] ?>" required>
                </div>

                <br>

                <input class="boton" type="submit" value="Actualizar">
                <br>
                <a href="mostrarCliente.php">Volver al inicio</a>
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

    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $correoElectronico_cli = $_POST['email'];
        $nombres_cli = $_POST['nombre'];
        $apellidos_cli = $_POST['apellido'];
        $rol_cli = $_POST['rol'];
        $contrasena_cli = $_POST['contrasena'];    

        $contrasena_cli = password_hash($contrasena_cli,PASSWORD_DEFAULT,array('password' =>10));

        $sql = 'UPDATE tb_clientes SET correoElectronico_cli = "$correoElectronico_cli", nombres_cli = "$nombres_cli", apellidos_cli = "$apellidos_cli", rol_cli = "$rol_cli", contrasena_cli = "$contrasena_cli" WHERE numeroDocumento_cli = "$numeroDocumento_cli"';
        $actualizarUno = Conexion::conexion()->query($sql);

        $actualizarUno->execute();

        }

    
    }

    }
}
?>