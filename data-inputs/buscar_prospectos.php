<?php
require '../clases/cl_prospecto.php';
$c_prospecto = new cl_prospecto();

$searchTerm = (filter_input(INPUT_GET, 'term'));
$array = $c_prospecto->ver_filas_busqueda($searchTerm);

$a_resultado = array();
foreach ($array as $fila) {
    $a_json_row['value'] = $fila['nombre_comercial'] . " | " . $fila['datos'];
    $a_json_row['datos'] = $fila['datos'];
    $a_json_row['email'] = $fila['email'];
    $a_json_row['celular'] = $fila['celular'];
    $a_json_row['empresa'] = $fila['nombre_comercial'];
    $a_json_row['codigo'] = $fila['id_prospecto'];
    array_push($a_resultado, $a_json_row);
}

print_r(json_encode($a_resultado));
flush();