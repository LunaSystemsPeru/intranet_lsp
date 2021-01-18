<?php
require '../../models/cl_proveedor.php';

$c_proveedor = new cl_proveedor();

echo $c_proveedor->verFilasJson();