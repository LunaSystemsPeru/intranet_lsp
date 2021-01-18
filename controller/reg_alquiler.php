<?php
require '../models/cl_alquiler.php';
require '../tools/cl_varios.php';
$c_alquiler = new cl_alquiler();
$c_varios = new cl_varios();

$c_alquiler->setFechaInicio(filter_input(INPUT_POST, 'input_fecha'));
$c_alquiler->setIdProspecto(filter_input(INPUT_POST, 'input_id_prospecto'));
$c_alquiler->setIdProductoPrecio(filter_input(INPUT_POST, 'select_sub_producto'));
$c_alquiler->setIdProducto(filter_input(INPUT_POST, 'select_producto'));
$c_alquiler->setMontoCuota(filter_input(INPUT_POST, 'input_total'));
$c_alquiler->setTipoPago(filter_input(INPUT_POST, 'id_tipo_pago'));


$c_alquiler->setFechaPago($c_varios->sumar_dias_fecha($c_alquiler->getFechaInicio(), 365));
$c_alquiler->setFechaSiguientePago($c_alquiler->getFechaPago());

$c_alquiler->obtener_id();

if ($c_alquiler->insertar()) {
    header("Location: ../contents/ver_alquileres.php");
}