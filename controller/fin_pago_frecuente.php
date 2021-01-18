<?php
require '../models/cl_pago_frecuente.php';

$c_pago = new cl_pago_frecuente();

$c_pago->setId(filter_input(INPUT_GET, 'input_codigo'));

if ($c_pago->pasar_pago()) {
    header("Location: ../contents/ver_pagos_frecuentes.php");
}