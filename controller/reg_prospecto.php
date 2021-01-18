<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 26/07/19
 * Time: 11:47 AM
 */

require '../models/cl_prospecto.php';

$c_prospecto = new cl_prospecto();

$c_prospecto->setDatos(filter_input(INPUT_POST, 'input_representante'));
$c_prospecto->setEmail(filter_input(INPUT_POST, 'input_email'));
$c_prospecto->setCelular(filter_input(INPUT_POST, 'input_celular'));
$c_prospecto->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_prospecto->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_prospecto->setNombreComercial(filter_input(INPUT_POST, 'input_comercial'));
$c_prospecto->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_prospecto->setEstado(0);

$hecho = false;

if (filter_input(INPUT_POST, 'input_codigo')) {
    $c_prospecto->setIdProspecto(filter_input(INPUT_POST, 'input_codigo'));
    $hecho = $c_prospecto->actualizar();
} else {
    $c_prospecto->obtener_id();
    $hecho = $c_prospecto->insertar();
}

if ($hecho) {
    header("Location: ../contents/ver_prospectos.php");
}
