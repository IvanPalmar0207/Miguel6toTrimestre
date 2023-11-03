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

    public function mostrarReservas(){
    }

}

?>