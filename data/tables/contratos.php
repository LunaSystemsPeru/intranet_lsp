<?php
require '../../models/cl_contrato.php';

$c_contrato = new cl_contrato();

echo $c_contrato->verFilasJson();