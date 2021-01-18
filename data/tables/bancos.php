<?php
require '../../models/cl_banco.php';
$c_banco = new cl_banco();

echo $c_banco->ver_filas_json();