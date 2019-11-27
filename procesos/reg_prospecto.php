<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 26/07/19
 * Time: 11:47 AM
 */

require '../clases/cl_prospecto.php';

$c_prospecto = new cl_prospecto();

$c_prospecto->setDatos(filter_input(INPUT_POST, 'input_representante'));
$c_prospecto->setEmail(filter_input(INPUT_POST, 'input_email'));
$c_prospecto->setCelular(filter_input(INPUT_POST, 'input_celular'));
$c_prospecto->setRuc(filter_input(INPUT_POST, 'input_ruc'));
$c_prospecto->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_prospecto->setNombreComercial(filter_input(INPUT_POST, 'input_comercial'));
$c_prospecto->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_prospecto->setEstado(0);
$c_prospecto->obtener_id();

if ($c_prospecto->insertar()) {
    header("Location: ../ver_prospectos.php");
}