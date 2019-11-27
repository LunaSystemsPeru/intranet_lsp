<?php
require_once '../clases_dashboard/cl_venta.php';

$c_venta = new cl_venta();

$tipo = filter_input(INPUT_GET, 'tipo');

if ($tipo == 1) {
    echo $c_venta->verVentasDiarias();
}