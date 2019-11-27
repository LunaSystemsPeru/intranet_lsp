<?php

require '../clases/cl_orden_interna.php';
$c_ordenes = new cl_orden_interna();

$array_ordenes = $c_ordenes->ver_ordenes_mensuales();

$array_cuenta = array();
foreach ($array_ordenes as $fila) {
    $array_cuenta[] = $fila['cuenta'];
}

echo json_encode($array_cuenta);