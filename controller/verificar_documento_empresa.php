<?php
require '../models/DocumentoInternet.php';

$c_internet = new DocumentoInternet();

$ruc = filter_input(INPUT_GET, 'ruc');

$existe_empresa = false;

if ($existe_empresa) {
    //aqui se imprimir un array que diga que la empresa ya existe
    echo "existe";
} else {
    $c_internet->setTipo(1);
    $c_internet->setDocumento($ruc);
    echo $c_internet->validar();
}