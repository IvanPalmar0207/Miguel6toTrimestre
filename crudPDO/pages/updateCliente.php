<?php

require_once('usuarioClass.php');

$numeroDocumento_cli = ['numeroDocumento_cli'];

$usuario = new Usuario();

$usuario->actualizarCliente($numeroDocumento_cli);

?>