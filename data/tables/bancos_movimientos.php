<?php
require '../../models/cl_banco_movimiento.php';

$c_movimiento = new cl_banco_movimiento();

$c_movimiento->setIdBanco(filter_input(INPUT_GET, 'id_banco'));
$c_movimiento->setFecha(_data_first_month_day());
$saldo = $c_movimiento->verSaldoAnterior();
$array_filas = Array();

$array = array(
    "id_movimiento" => 0,
    "fecha" => $c_movimiento->getFecha() ,
    "descripcion" => "SALDO ANTERIOR",
    "ingresa" => number_format($saldo, 2),
    "sale" => "-",
    "saldo" => number_format($saldo,2),
    "nom_clasificacion" => "SALDO");

array_push($array_filas, $array);

$item = 1;
$a_movimientos = $c_movimiento->verFilasMensual(date("Ym")) ;
foreach ($a_movimientos as $fila) {
    $saldo += ($fila['ingresa'] - $fila['sale']);
    $array = array(
        "id_movimiento" => $item,
        "fecha" => $fila['fecha'],
        "descripcion" => $fila['descripcion'],
        "ingresa" => ($fila['ingresa']== 0) ? "-" : number_format($fila['ingresa'], 2),
        "sale" => ($fila['sale']== 0) ? "-" : number_format($fila['sale'],2),
        "saldo" => number_format($saldo, 2),
        "nom_clasificacion" => $fila['nom_clasificacion']);
    $item++;
    array_push($array_filas, $array);
}

echo json_encode($array_filas);

function _data_first_month_day()
{
    $month = date('m');
    $year = date('Y');
    return date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
}