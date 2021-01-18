<?php
require '../../models/cl_gasto.php';

$c_gasto = new cl_gasto();

echo $c_gasto->verFilasJson();