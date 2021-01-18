<?php
require '../../models/cl_alquiler.php';
$c_alquiler = new cl_alquiler();

$tipo = filter_input(INPUT_GET, 'tipo');

if ($tipo == 1) {
    echo $c_alquiler->sumaAnual();
}

if ($tipo == 2) {
    echo $c_alquiler->verCobrosMensuales();
}