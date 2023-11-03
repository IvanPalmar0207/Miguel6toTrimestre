<link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
<title>Eliminar Habitacion</title>

<?php

require_once('tipoHabitacionClass.php');

$codigo_tpH = $_GET['codigo_tpH'];

$tipoHabitacion = new TipoHabitacion();

$tipoHabitacion->eliminarHabitacion($codigo_tpH);

?>