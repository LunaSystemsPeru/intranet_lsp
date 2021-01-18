<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require '../tools/PHPMailer/Exception.php';
require '../tools/PHPMailer/PHPMailer.php';
require '../tools/PHPMailer/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

//$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

function TildesHtml($cadena)
{
    return str_replace(array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ"), array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;",
        "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;"), $cadena);
}

//Server settings
$mail->SMTPDebug = 2;                                 // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'a2plcpnl0713.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ventas@lunasystemsperu.com';                 // SMTP username
$mail->Password = 'Hb(XyXG^egl=';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to 465 to ssl y 587 tls


$mail->setFrom('ventas@lunasystemsperu.com', 'Ventas y Cobranzas - Luna Systems Peru');
$mail->addReplyTo('info@lunasystemsperu.com', 'Informacion de Servicios - Luna Systems Peru');