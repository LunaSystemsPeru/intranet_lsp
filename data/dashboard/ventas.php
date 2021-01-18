<?php
require_once '../../models/cl_venta.php';

$c_venta = new cl_venta();

$tipo = filter_input(INPUT_GET, 'tipo');

if ($tipo == 1) {
    echo $c_venta->verVentasDiarias();
}

if ($tipo == 2) {
    echo $c_venta->mostrarMes();
}