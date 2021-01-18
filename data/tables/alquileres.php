<?php
require '../../models/cl_alquiler.php';
$c_alquiler = new cl_alquiler();

$json_filas = $c_alquiler->ver_filas_json();

print_r($json_filas);
?>