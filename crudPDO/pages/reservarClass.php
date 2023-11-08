<?php

require_once('Conexion.php');

class Reserva{

    public function __construct(){
    }

    public function insertarReserva($codigo_res,$numeroDocumento_cli, $fechaLlegada, $fechaSalida, $cantidadJovenes, $cantidadAdultos){
        $sql = 'INSERT INTO tb_reserva VALUES (?,?,?,?,?,?)';

        $hacerReserva = Conexion::conexion()->prepare($sql);

        $hacerReserva->bindParam(1,$codigo_res);
        $hacerReserva->bindParam(2,$numeroDocumento_cli);
        $hacerReserva->bindParam(3,$fechaLlegada);
        $hacerReserva->bindParam(4,$fechaSalida);
        $hacerReserva->bindParam(5,$cantidadJovenes);
        $hacerReserva->bindParam(6,$cantidadAdultos);

        $hacerReserva->execute();
    }

    public function mostrarReservas($numeroDocumento_cli){

        $mostrarDatos = Conexion::conexion()->query('SELECT * FROM tb_reserva INNER JOIN tb_tipohabitacion_tb_reserva on tb_tipohabitacion_tb_reserva.codigo_res = tb_reserva.codigo_res INNER JOIN tb_tipohabitacion on tb_tipohabitacion_tb_reserva.codigo_tpH = tb_tipohabitacion.codigo_tpH WHERE numeroDoc_cli = '. $numeroDocumento_cli);        

        $mostrarDatos->setFetchMode(PDO::FETCH_ASSOC);

        $mostrarDatos->execute();

        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/usuarioClass.css">
        <table class="table">
            <thead class="table-info">
                    <tr>
                        <th scope='col'>Codigo de la Reserva</th>
                        <th scope='col'>Numero de documento</th>
                        <th scope='col'>Fecha de inicio</th>
                        <th scope='col'>Fecha de Salida</th>
                        <th scope='col'>Cantidad Jovenes</th>
                        <th scope='col'>Cantidad Adultos</th>
                        <th scope='col'>Tipo de habitacion</th>
                        <th scope='col'>Actualizar</th>
                        <th scope='col'>Eliminar</th>
                    </tr>
            </thead>
            <?php foreach ($mostrarDatos->fetchAll() as $fila){?>
                <tr>
                    <td><?php echo $fila['codigo_res'];?></td>
                    <td><?php echo $fila['numeroDoc_cli'];?></td>
                    <td><?php echo $fila['fechaInicio'];?></td>
                    <td><?php echo $fila['fechaSalida'];?></td>
                    <td><?php echo $fila['cantidadJovenes'];?></td>
                    <td><?php echo $fila['cantidadAultos']?></td>
                    <td><?php echo $fila['tipo_tpH']?></td>
                    <td>
                        <a href="updateReserva.php?codigo_res='<?php echo $fila['codigo_res']?>'"><img src="../img/actualizar.png" alt="imagenActualizar" width="30px" ></a>
                    </td>
                    <td>
                        <a href="updateReserva.php?codigo_res='<?php echo $fila['codigo_res'] ?>'"><img src="../img/eliminar.png" alt="imagenEliminar" width='30px'></a>                
                    </td>
                </tr>

                <?php } ?>
        </table>

        <?php
    }

    public function eliminarReserva($codigo_res){
        $sql= 'DELETE FROM tb_reserva WHERE codigo_res='. $codigo_res;
        Conexion::conexion()->query($sql)->execute();
        echo "<script type='text/javascript'>
                alert('Has cancelado la reserva correctamente...');
                window.location = './reservar.php';
        </script>";
    }

}

?>