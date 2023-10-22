<link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
<title>Eliminar cliente</title>

<?php

require_once('usuarioClass.php');

$numeroDocumento_cli= $_GET['numeroDocumento_cli'];
$usuario = new Usuario();
    
$usuario->eliminarCliente($numeroDocumento_cli);

?>
