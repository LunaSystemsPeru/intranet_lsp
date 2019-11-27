<?php
require '../clases/cl_prospecto.php';
$c_prospecto = new cl_prospecto();

$json_filas = $c_prospecto->ver_filas_json();

print_r($json_filas);
?>