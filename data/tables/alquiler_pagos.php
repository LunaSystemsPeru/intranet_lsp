<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 16/08/19
 * Time: 11:17 AM
 */

require '../../models/cl_alquiler_pago.php';
require '../../tools/cl_varios.php';

$c_pago = new cl_alquiler_pago();
$c_varios = new cl_varios();

$c_pago->setIdAlquiler(filter_input(INPUT_GET, 'id_alquiler'));
$resultado = $c_pago->ver_filas();
$array_general = [];

foreach ($resultado as $fila) {
    $array["id_pago"] = $fila['id_pago'];
    $array["fecha"] = $fila['fecha'];
    $documento = $fila['abreviatura'];
    $serie = $fila['serie'];
    $numero = $fila['numero'];
    $documento_completo = $documento . " | " . $c_varios->zerofill($serie, 3) . " - " . $c_varios->zerofill($numero, 4);
    $array["documento"] = $documento_completo;
    $array["monto"] = $fila['monto_total'];

    array_push($array_general, $array);
}

echo json_encode($array_general);