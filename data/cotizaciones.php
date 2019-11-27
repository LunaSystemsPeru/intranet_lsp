<?php
require '../clases/cl_cotizacion.php';
$c_cotizacion = new cl_cotizacion();

$json_filas = $c_cotizacion->ver_filas_json();

print_r($json_filas);
?>