<?php
require '../../models/cl_proveedor.php';
$c_proveedor = new cl_proveedor();

$searchTerm = (filter_input(INPUT_GET, 'term'));
$array = $c_proveedor->ver_filas_busqueda($searchTerm);

$a_resultado = array();
foreach ($array as $fila) {
    $a_json_row['value'] = $fila['razon_social'] . " | " . $fila['documento'];
    $a_json_row['datos'] = $fila['razon_social'];
    $a_json_row['direccion'] = $fila['direccion'];
    $a_json_row['codigo'] = $fila['id_proveedor'];
    $a_json_row['producto'] = $fila['producto'];
    array_push($a_resultado, $a_json_row);
}

print_r(json_encode($a_resultado));
flush();