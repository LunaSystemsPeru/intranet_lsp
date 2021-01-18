<?php
require '../models/cl_contrato_pago.php';
require '../models/cl_banco_movimiento.php';

$c_pago = new cl_contrato_pago();
$c_movimiento = new cl_banco_movimiento();

$c_pago->setIdContrato(filter_input(INPUT_POST,'hidden_id_contrato'));

$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_movimiento->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));
$c_movimiento->setIngresa(0);
$c_movimiento->setSale(filter_input(INPUT_POST, 'input_monto_pagar'));
$c_movimiento->setIdUsuario(1);
$c_movimiento->setIdClasificacion(filter_input(INPUT_POST, 'hidden_id_clasificacion'));
$c_movimiento->obtener_id();

$c_pago->setIdMovimiento($c_movimiento->getIdMovimiento());

if ($c_movimiento->insertar()) {
    if ($c_pago->insertar()) {
        header("Location: ../contents/ver_detalle_contrato.php?id_contrato=" . $c_pago->getIdContrato());
    }
}