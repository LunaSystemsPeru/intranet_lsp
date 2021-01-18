<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 26/07/19
 * Time: 11:47 AM
 */

require '../models/cl_cotizacion.php';

$c_cotizacion = new cl_cotizacion();

$c_cotizacion->setFecha(filter_input(INPUT_POST, 'input_fecha'));
$c_cotizacion->setNumero(filter_input(INPUT_POST, 'input_numero'));
$c_cotizacion->setIdProspecto(filter_input(INPUT_POST, 'input_id_prospecto'));
$c_cotizacion->setDescripcion(filter_input(INPUT_POST, 'input_servicio'));
$c_cotizacion->setDuracion(filter_input(INPUT_POST, 'input_duracion'));
$c_cotizacion->setTotal(filter_input(INPUT_POST, 'input_total'));
$c_cotizacion->setIdUsuario($_SESSION['id_usuario']);
$c_cotizacion->setTipoPago(filter_input(INPUT_POST, 'select_tipo_pago'));
$c_cotizacion->setEstado(0);
$c_cotizacion->obtener_id();

$errores = 0;

if (!empty($_FILES["input_archivo_pdf"])) {
    $file = $_FILES["input_archivo_pdf"];
    $file_name = $file['name'];
    $file_temporal = $file['tmp_name'];

    $validextensions = array("PDF", "pdf");
    $temporary = explode(".", $file["name"]);
    $file_extension = end($temporary);
    if ($file["error"] > 0) {
        die("Return Code: " . $file["error"] . "<br/><br/>");
    } else {

        //establecer directorio de subida
        $dir_subida = '../archivos/cotizaciones/';
        //crear carpeta sino existe
        if (!file_exists($dir_subida)) {
            if (!mkdir($dir_subida, 0777, true)) {
                die('Fallo al crear las carpetas...');
            }
        }

        //establecer nombre de archivo
        $c_cotizacion->setArchivoPdf($c_cotizacion->getIdCotizacion() . '.' . $file_extension);

        if (move_uploaded_file($file_temporal, $dir_subida . $c_cotizacion->getArchivoPdf())) {
            //print "El archivo fue subido con éxito.";

        } else {
            die ("Error al intentar subir el archivo en word.");
        }
    }
} else {
    die ("no hay archivo seleccionado");
}

if ($c_cotizacion->insertar()) {
    header("Location: ../contents/ver_cotizaciones.php");
}