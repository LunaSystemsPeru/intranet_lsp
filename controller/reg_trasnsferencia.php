<?php
require '../models/cl_banco_movimiento.php';
require '../models/cl_banco.php';

$c_movimiento = new cl_banco_movimiento();
$c_banco = new cl_banco();

//registro salida de dinero
$c_banco->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$c_banco->obtener_datos();

$c_movimiento->obtener_id();
$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'hidden_banco_origen'));
$c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_movimiento->setDescripcion("TRANSFERENCIA A " . $c_banco->getNombre());
$c_movimiento->setIngresa(0);
$c_movimiento->setSale(filter_input(INPUT_POST, 'input_monto'));
$c_movimiento->setIdUsuario(1);
$c_movimiento->setIdClasificacion(17);
$c_movimiento->insertar();

//registro de ingreso de dinero
$c_banco->setIdBanco(filter_input(INPUT_POST, 'hidden_banco_origen'));
$c_banco->obtener_datos();

$c_movimiento->obtener_id();
$c_movimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
$c_movimiento->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_movimiento->setDescripcion("TRANSFERENCIA DESDE " . $c_banco->getNombre());
$c_movimiento->setIngresa(filter_input(INPUT_POST, 'input_monto'));
$c_movimiento->setSale(0);
$c_movimiento->setIdUsuario(1);
$c_movimiento->setIdClasificacion(17);
$c_movimiento->insertar();

header("Location: ../contents/ver_bancos_movimientos.php?id_banco=" . $c_banco->getIdBanco());

