<?php

require_once('Conexion.php');

class Reserva{

    public function __construct(){    
    }

    public function insertarReserva($numeroDocumento_cli, $fechaLlegada, $fechaSalida, $cantidadJovenes, $cantidadAdultos, $tipoHabitacion){

        $sql = 'INSERT INTO tb_reserva(numeroDoc_cli,fechaInicio,fechaSalida,cantidadJovenes,cantidadAultos) VALUES (?,?,?,?,?)';

        $hacerReserva = Conexion::conexion()->prepare($sql);

        $hacerReserva->bindParam(1,$numeroDocumento_cli);
        $hacerReserva->bindParam(2,$fechaLlegada);
        $hacerReserva->bindParam(3,$fechaSalida);
        $hacerReserva->bindParam(4,$fec);
        $hacerReserva->bindParam(5);

    }

}

?>