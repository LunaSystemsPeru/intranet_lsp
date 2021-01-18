<?php
require '../../models/cl_producto_precio.php';

$c_subproducto = new cl_producto_precio();

$c_subproducto->setIdProducto(filter_input(INPUT_POST, 'id'));

echo $c_subproducto->ver_filas_json();