<link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
<title>Cancelar Reserva</title>

<?php

require_once('reservarClass.php');

$codigo_res = $_GET['codigo_res'];

$reserva = new Reserva;
$reserva->eliminarReserva($codigo_res);

?>