<?php

require_once('conexion.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $numeroDocumento_cli = $_GET['numeroDocumento_cli'];
    $codigo_tpD =$_GET['codigo_tpD'];
    $correoElectronico_cli = $_GET['correoElectronico_cli'];
    $nombres_cli = $_GET['nombres_cli'];
    $apellidos_cli = $_GET['apellidos_cli'];
    $codigo_rl = $_GET['codigo_rl'];
    $contrasena_cli = $_GET['contrasena_cli'];

    $sql = 'INSERT INTO tb_usuarios VALUES ("'.$numeroDocumento_cli.'","'.$codigo_tpD.'","'.$correoElectronico_cli.'","'.$nombres_cli.'","'.$apellidos_cli.'","'.$codigo_rl.'","'.$contrasena_cli.'")';

    $resultado = $db->prepare($sql);

    if($resultado->execute()){
        return true;
    }else{
        return false;
    }
}

?>