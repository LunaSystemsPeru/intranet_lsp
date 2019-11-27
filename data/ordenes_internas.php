<?php
require '../clases/cl_orden_interna.php';

$c_ordenes = new cl_orden_interna();

echo $c_ordenes->ver_filas_json();