<?php
require '../../models/cl_venta_cobro.php';
$cobro = new cl_venta_cobro();

echo $cobro->datosPromediados();
