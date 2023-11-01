<?php

require_once('Conexion.php');

class TipoHabitacion{

    public function __construct(){

    }

    public function insertarHabitaciones(string $tipo_tpH,float $precio_tph,int $cantidadDisponible_tpH,string $descripciontpH,int $minimoPer_tpH,int $maximoPer_tpH,$imagen_tpH){

        $insertarHabitacion = Conexion::conexion()->prepare('INSERT INTO tb_tipohabitacion(tipo_tpH,precio_tpH,cantidadDisponible_tpH,descripcion_tpH,minimoPer_tpH,maximoPer_tpH,imagen_tpH) VALUES(?,?,?,?,?,?,?)');

        $insertarHabitacion->bindParam(1,$tipo_tpH);
        $insertarHabitacion->bindParam(2,$precio_tph);
        $insertarHabitacion->bindParam(3,$cantidadDisponible_tpH);
        $insertarHabitacion->bindParam(4,$descripciontpH);
        $insertarHabitacion->bindParam(5,$minimoPer_tpH);
        $insertarHabitacion->bindParam(6,$maximoPer_tpH);
        $insertarHabitacion->bindParam(7,$imagen_tpH);

        $insertarHabitacion->execute();

    }

    public function mostrarHabitaciones(){
        
        $mostraHabitaciones = Conexion::conexion()->query('SELECT * FROM tb_tipohabitacion');        

        $mostraHabitaciones->setFetchMode(PDO::FETCH_ASSOC);

        $mostraHabitaciones->execute();

        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/usuarioClass.css">
        <table class="table">
            <br>
            <thead class="table-info table-bordered">                
                    <tr>
                        <th scope='col'>Codigo de la habitacion</th>
                        <th scope='col'>Tipo de la habitacion</th>
                        <th scope='col'>Precio de la habitacion</th>
                        <th scope='col'>Habitaciones disponibles</th>
                        <th scope='col'>Descripcion de la habitacion</th>
                        <th scope='col'>Minimo de personas</th>
                        <th scope='col'>Maximo de personas</th>
                        <th scope='col'>Imagen de la habitacion</th>
                        <th scope='col'>Actualizar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
            </thead>
            <?php while ($fila = $mostraHabitaciones->fetch()){?>
                <tr>
                    <td><?php echo $fila['codigo_tpH'];?></td>
                    <td><?php echo $fila['tipo_tpH'];?></td>
                    <td><?php echo $fila['precio_tpH'];?></td>
                    <td><?php echo $fila['cantidadDisponible_tpH'];?></td>
                    <td><?php echo $fila['descripcion_tpH'];?></td>
                    <td><?php echo $fila['minimoPer_tpH']?></td>
                    <td><?php echo $fila['maximoPer_tpH']?></td>
                    <td><?php echo $fila['imagen_tpH'] ?></td>
                    <td>
                        <a href="updateHabitacion.php?codigo_tpH='<?php echo $fila['codigo_tpH']?>'"><img src="../img/actualizar.png" alt="imagenActualizar" width="30px" ></a>
                    </td>
                    <td>
                        <a href="deleteHabitacion.php?codigo_tpH='<?php echo $fila['codigo_tpH'] ?>'"><img src="../img/eliminar.png" alt="imagenEliminar" width='30px'></a>                
                    </td>
                </tr>

                <?php } ?>
        </table>

        <?php
    }

    public function eliminarHabitacion($codigo_tpH){

        $sql = "DELETE FROM tb_tipohabitacion WHERE codigo_tpH = ". $codigo_tpH;

        $eliminarHabitacion = Conexion::conexion()->prepare($sql);

        $eliminarHabitacion->execute();

        echo "<script type='text/javascript'>
            alert('La habitacion ha sido eliminada correctamente...');
            window.location = './mostrarHabitacion.php';
        </script>";

    }

}


?>