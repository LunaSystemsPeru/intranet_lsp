<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 26/07/19
 * Time: 11:47 AM
 */

require '../models/cl_prospecto.php';

$c_prospecto = new cl_prospecto();

$c_prospecto->setIdProspecto(filter_input(INPUT_GET, 'input_codigo'));

if ($c_prospecto->eliminar()) {
    header("Location: ../contents/ver_prospectos.php");
}
