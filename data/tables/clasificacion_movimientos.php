<?php
require '../../models/cl_clasificacion_movimientos.php';

$c_clasificacion = new cl_clasificacion_movimientos();

echo $c_clasificacion->verFilasJson();