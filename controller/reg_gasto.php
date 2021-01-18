<?php
require '../models/cl_gasto.php';
require '../models/cl_banco_movimiento.php';

$c_movimiento = new cl_banco_movimiento();
$c_gasto = new cl_gasto();

$id_movimiento = filter_input(INPUT_GET, 'id_movimiento');
if (!$id_movimiento || $id_movimiento == 0) {
    $c_movimiento->setIdUsuario(1);
    $c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
    $c_movimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
    $c_movimiento->setIngresa(0);
    $c_movimiento->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));
    $c_movimiento->setDescripcion(strtoupper($c_movimiento->getDescripcion()));
    $c_movimiento->setSale(filter_input(INPUT_POST, 'input_monto'));
    $c_movimiento->setIdClasificacion(filter_input(INPUT_POST, 'select_clasificacion'));

    $c_movimiento->obtener_id();

    $c_gasto->setId($c_movimiento->getIdMovimiento());

    if ($c_movimiento->insertar()) {
        $c_gasto->insertar();
        header("Location: ../contents/ver_gastos.php");
    }
} else {
    $c_gasto->setId($id_movimiento);
    $c_movimiento->setIdMovimiento($id_movimiento);

    if ($c_gasto->eliminar()) {
        $c_movimiento->eliminar();
        header("Location: ../contents/ver_gastos.php");
    }
}