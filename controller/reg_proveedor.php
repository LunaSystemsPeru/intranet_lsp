<?php
require '../models/cl_proveedor.php';

$c_proveedor = new cl_proveedor();

$c_proveedor->setDocumento(filter_input(INPUT_POST, 'input_ruc'));
$c_proveedor->setRazonSocial(filter_input(INPUT_POST, 'input_razon_social'));
$c_proveedor->setDireccion(filter_input(INPUT_POST, 'input_direccion'));
$c_proveedor->setProducto(filter_input(INPUT_POST, 'input_producto'));

$c_proveedor->obtener_id();

if ($c_proveedor->insertar()) {
    header("Location: ../contents/ver_proveedores.php");
}