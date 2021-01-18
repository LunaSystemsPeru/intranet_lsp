<?php
require '../../models/cl_pago_frecuente.php';
$c_pago = new cl_pago_frecuente();

echo $c_pago->verFilasJson();