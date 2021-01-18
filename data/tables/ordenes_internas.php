<?php
require '../../models/cl_orden_interna.php';

$c_ordenes = new cl_orden_interna();
$tipo = filter_input(INPUT_GET, 'tipo');

if ($tipo == 1) {
    echo $c_ordenes->verTodas();
}

if ($tipo == 2) {
    echo $c_ordenes->verPasados();
}