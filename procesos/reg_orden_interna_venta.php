<?php
require '../clases/cl_venta.php';
require '../clases/cl_orden_interna.php';
require '../clases/cl_orden_interna_venta.php';
require '../clases/cl_documento_empresa.php';
require '../clases/cl_documento_sunat.php';
require '../clases/cl_banco_movimiento.php';
require '../clases/cl_venta_cobro.php';

$c_venta = new cl_venta();
$c_orden_interna = new cl_orden_interna();
$c_orden_venta = new cl_orden_interna_venta();
$c_documento = new cl_documento_empresa();
$c_sunat = new cl_documento_sunat();
$c_movimiento = new cl_banco_movimiento();
$c_cobro = new cl_venta_cobro();


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
$c_venta->setArchivo("");

//llenar orden interna
$c_orden_venta->setIdOrdenInterna(filter_input(INPUT_POST, 'hidden_id_orden'));
$c_orden_venta->setIdVenta($c_venta->getIdVenta());

//obtener datos de la orden interna
$c_orden_interna->setIdOrdenInterna($c_orden_venta->getIdOrdenInterna());
$c_orden_interna->obtener_datos();

//verificar que esta marcado el checkbox pago
if (isset($_REQUEST['checkbox_pagado'])) {
    //OBTENER NOMBRE DE DOCUMENTO SUNAT
    $c_sunat->setIdDocumento($c_venta->getIdDocumento());
    $c_sunat->obtener_datos();

    //llenar datos de movimiento
    $c_movimiento->obtener_id();
    $c_movimiento->setFecha($c_venta->getFecha());
    $c_movimiento->setIdBanco(filter_input(INPUT_POST, 'select_banco'));
    $c_movimiento->setDescripcion("RECAUDO DE ORDEN INTERNA NRO: " . $c_orden_interna->getNumeroOrden() . "DOC.: " . $c_sunat->getAbreviatura() . " | " . $c_venta->getSerie() . " - " . $c_venta->getNumero());
    $c_movimiento->setIngresa($c_venta->getMontoTotal());
    $c_movimiento->setSale(0);
    $c_movimiento->setIdUsuario($_SESSION['id_usuario']);
    $c_movimiento->setIdClasificacion(1);

    //llenar datos de cobro
    $c_cobro->setFecha($c_venta->getFecha());
    $c_cobro->setIdVenta($c_venta->getIdVenta());
    $c_cobro->setMonto($c_venta->getMontoTotal());
    $c_cobro->setIdMovimiento($c_movimiento->getIdMovimiento());
    $c_cobro->setIdUsuario($_SESSION['id_usuario']);
    $c_cobro->obtener_id();
}

if ($c_venta->insertar()) {
    //si esta seleccionado pagado pagar documento
    if (isset($_REQUEST['checkbox_pagado'])) {
        if ($c_movimiento->insertar()) {
            //insertar cobro de venta
            $c_cobro->insertar();
        }
    } else {
        die ("error al ingresar en movimientos");
    }

    if ($c_orden_venta->insertar()) {
        header("Location: ../ver_detalle_orden_interna.php?id_orden_interna=" . $c_orden_venta->getIdOrdenInterna());
    }

}