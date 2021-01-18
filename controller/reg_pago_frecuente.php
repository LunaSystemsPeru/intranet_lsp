<?php
require '../models/cl_pago_frecuente.php';

$c_pago = new cl_pago_frecuente();

$c_pago->setIdClasificacion(filter_input(INPUT_POST, 'select_clasificacion'));
$c_pago->setFrecuencia(filter_input(INPUT_POST, 'select_frecuencia'));
$c_pago->setServicio(filter_input(INPUT_POST, 'input_servicio'));
$c_pago->setIdProveedor(filter_input(INPUT_POST, 'hidden_id_proveedor'));
$c_pago->setMonto(filter_input(INPUT_POST, 'input_monto'));
$c_pago->setFechaRecordatorio(filter_input(INPUT_POST, 'input_fecha'));

$c_pago->obtener_id();

if ($c_pago->insertar()) {
    header("Location: ../contents/ver_pagos_frecuentes.php");
}