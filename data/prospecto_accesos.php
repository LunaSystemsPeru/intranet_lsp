<?php
require '../clases/cl_prospecto_accesos.php';
$c_accesos = new cl_prospecto_accesos();

$c_accesos->setIdProspecto(filter_input(INPUT_GET, 'id_prospecto'));
$json_filas = $c_accesos->ver_filas_json();

print_r($json_filas);
?>