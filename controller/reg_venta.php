<?php
require '../models/cl_venta.php';
require '../models/cl_documento_empresa.php';

$c_venta = new cl_venta();
$c_documento = new cl_documento_empresa();

$c_venta->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_venta->obtener_numero();
$c_venta->obtener_id();
$c_venta->setIdProspecto(filter_input(INPUT_POST, 'hidden_id_prospecto'));

//obtener ultimo numero de documento sunat
$c_venta->setIdDocumento(filter_input(INPUT_POST, 'select_documento'));
$c_documento->setIdDocumento($c_venta->getIdDocumento());
$c_documento->obtener_datos();
$c_venta->setSerie($c_documento->getSerie());
$c_venta->setNumero($c_documento->getNumero());

$c_venta->setMontoTotal(filter_input(INPUT_POST, 'input_monto'));
$c_venta->setIdUsuario($_SESSION['id_usuario']);
$c_venta->setArchivo();