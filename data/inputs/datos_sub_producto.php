<?php
require '../../models/cl_producto_precio.php';

$c_subproducto = new cl_producto_precio();
$c_subproducto->setIdProductoPrecio(filter_input(INPUT_POST, 'id'));

echo json_encode($c_subproducto->obtener_datos());