<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 16/08/19
 * Time: 11:50 AM
 */

include '../tools/config_correo.php';
require '../models/cl_alquiler.php';
require '../models/cl_alquiler_pago.php';
require '../models/cl_prospecto.php';

$c_alquiler = new cl_alquiler();
$c_prospecto = new cl_prospecto();
$c_pago = new cl_alquiler_pago();

$c_pago->setIdPago(filter_input(INPUT_GET, 'id_pago'));
$c_pago->obtener_datos();

$c_alquiler->setIdAlquiler($c_pago->getIdAlquiler());
$c_alquiler->obtener_datos();

$c_prospecto->setIdProspecto($c_alquiler->getIdProspecto());
$c_prospecto->obtener_datos();

//Recipients
$email_to = $c_prospecto->getEmail();
$dominio = "http://" . $_SERVER["HTTP_HOST"] . "/lsp/nueva_intranet/";
$message = file_get_contents($dominio . "template_email/email_pago_alquiler.php?id_pago=" . $c_pago->getIdPago());

//Content
$mail->addAddress($email_to);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = "COMPROBANTE DE PAGO - ALQUILER DE SERVICIOS - LUNA SYSTEMS PERU";
$mail->Body = TildesHtml($message);
$mail->AltBody = "COMPROBANTE DE PAGO - ALQUILER DE SERVICIOS - LUNA SYSTEMS PERU";

if ($mail->send()) {
    echo "<center>Su informacion ha sido enviada correctamente a la direccion de email especificada.<br/>(sientase libre de cerrar esta ventana)</center>";
    ?>
    <script>
        //window.location.href = "../ver_ventas.php";
    </script>
    <?php

}
//   echo 'Message has been sent';