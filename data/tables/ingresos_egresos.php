<?php

require '../../models/cl_banco_movimiento.php';

$c_movimiento = new cl_banco_movimiento();

echo $c_movimiento->ver_ingresos_mensuales();
