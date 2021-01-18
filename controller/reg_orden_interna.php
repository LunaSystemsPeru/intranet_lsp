<?php
require '../models/cl_orden_interna.php';

$c_orden_interna = new cl_orden_interna();

$c_orden_interna->setIdCotizacion(filter_input(INPUT_POST, 'hidden_id_cotizacion'));
$c_orden_interna->obtener_id();
$c_orden_interna->obtener_numero();
$c_orden_interna->setDuracion(filter_input(INPUT_POST, 'hidden_duracion'));
$c_orden_interna->setFechaInicio(filter_input(INPUT_POST, 'input_fecha'));
$c_orden_interna->setMontoAprobado(filter_input(INPUT_POST, 'input_maprobado'));
$c_orden_interna->setIdUsuario($_SESSION['id_usuario']);

if ($c_orden_interna->insertar()) {
    header("Location: ../contents/ver_ordenes_interna.php");
}