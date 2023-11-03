<?php

require_once('Conexion.php');

class ReservaHabitacion{

    public function __construct(){

    }

    public function insertarReservaHabitacion($codigo_res,$codigo_tpH){
        $sql = 'INSERT INTO tb_tipohabitacion_tb_reserva VALUES(?,?)';

        $insertarResHab = Conexion::conexion()->prepare($sql);
        $insertarResHab->bindParam(1,$codigo_tpH);
        $insertarResHab->bindParam(2,$codigo_res);

        $insertarResHab->execute();
    }


}

?>