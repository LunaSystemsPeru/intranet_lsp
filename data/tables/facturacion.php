<?php
require '../../models/cl_venta.php';
$c_venta = new cl_venta();

$json_filas = $c_venta->ver_filas_json();

print_r($json_filas);
?>