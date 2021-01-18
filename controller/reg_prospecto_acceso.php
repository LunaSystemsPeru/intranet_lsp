<?php
require '../models/cl_prospecto_accesos.php';

$c_acceso = new cl_prospecto_accesos();

$c_acceso->setNombre(filter_input(INPUT_POST, 'input_nombre'));
$c_acceso->setUrl(filter_input(INPUT_POST, 'input_url'));
$c_acceso->setUsuario(filter_input(INPUT_POST, 'input_usuario'));
$c_acceso->setClave(filter_input(INPUT_POST, 'input_clave'));
$c_acceso->setIdProspecto(filter_input(INPUT_POST, 'hidden_id_prospecto'));
$c_acceso->obtener_id();

if ($c_acceso->insertar()) {
    header("Location: ../contents/ver_detalle_prospecto.php?id_prospecto=" . $c_acceso->getIdProspecto());
}