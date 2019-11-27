<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 15/08/19
 * Time: 02:34 PM
 */

require '../clases/cl_producto.php';

$c_producto = new cl_producto();

echo $c_producto->ver_filas_json();