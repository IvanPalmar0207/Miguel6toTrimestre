<?php

class Conexion{

    //Varibles de conexion
    private static string $driver = 'mysql:host=localhost;port=3306;dbname=hotelpegasusprueba';
    private static string $nombreUsuario = 'root';
    private static string $contrasenaUsuario = '';
    private static $opciones = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

    public static function conexion(){
        //Conexion a la BD
        $conexion = new PDO(Conexion::$driver,Conexion::$nombreUsuario,Conexion::$contrasenaUsuario,Conexion::$opciones);
        return $conexion;
    }
}

?>