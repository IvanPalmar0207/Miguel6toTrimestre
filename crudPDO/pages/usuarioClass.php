<?php

require_once('Conexion.php');

class Usuario{
    public function __construct(){

    }

    public function insertarDatos(int $numeroDocumento_cli, string $tipoDocumento_cli, string $correoElectronico_cli, string $nombres_cli, string $apellidos_cli, string $rol_cli, string $contrasena_cli){
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
                        <a href="updateCliente.php?numeroDocumento_cli='<?php echo $fila['numeroDocumento_cli']?>'"><img src="../img/actualizar.png" alt="imagenActualizar" width="30px" ></a>
                    </td>
                    <td>
                        <a href="eliminarCliente.php?numeroDocumento_cli='<?php echo $fila['numeroDocumento_cli'] ?>'"><img src="../img/eliminar.png" alt="imagenEliminar" width='30px'></a>                
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
                window.location = './mostrarCliente.php';
        </script>";    
    }    
    public function iniciarSesion(string $numeroDocumento_cli ,string $correoElectronico_cli, string $contrasena_cli){

        $sql = "SELECT * FROM tb_clientes WHERE numeroDocumento_cli = :numeroDocumento AND correoElectronico_cli = :correo AND contrasena_cli = :contrasena";

        $selecionUno = Conexion::conexion()->prepare($sql);

        $selecionUno->bindParam(':numeroDocumento',$numeroDocumento_cli);
        $selecionUno->bindParam(':correo',$correoElectronico_cli);
        $selecionUno->bindParam(':contrasena',$contrasena_cli);        
        $selecionUno->execute();

        $usuarioDB = $selecionUno->fetch(PDO::FETCH_ASSOC);

        if ($usuarioDB) {
            // Las credenciales son válidas, inicio de sesión exitoso
            session_start();        
            // Puedes redirigir a otra página una vez que el inicio de sesión sea exitoso
            header('Location: index.php');
            exit;
        } else {
            // Credenciales inválidas
            echo 'Credenciales inválidas. Inténtalo de nuevo.';
        }
    }

}
?>