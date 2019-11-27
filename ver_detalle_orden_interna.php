<?php
require 'clases/cl_orden_interna.php';
require 'clases/cl_orden_interna_venta.php';
require 'clases/cl_cotizacion.php';
require 'clases/cl_prospecto.php';
require 'clases_varios/cl_varios.php';

$c_orden_interna = new cl_orden_interna();
$c_venta_interna = new cl_orden_interna_venta();
$c_cotizacion = new cl_cotizacion();
$c_prospecto = new cl_prospecto();

$c_varios = new cl_varios();

if (filter_input(INPUT_GET, 'id_orden_interna')) {
    $c_orden_interna->setIdOrdenInterna(filter_input(INPUT_GET, 'id_orden_interna'));
    $c_orden_interna->obtener_datos();

    //cargar documentos de venta
    $c_venta_interna->setIdOrdenInterna($c_orden_interna->getIdOrdenInterna());
    $filas_documentos = $c_venta_interna->ver_filas();

    //cargar dtos de la cotizacion anexa
    $c_cotizacion->setIdCotizacion($c_orden_interna->getIdCotizacion());
    $c_cotizacion->obtener_datos();

    //cargar datos del prospecto
    $c_prospecto->setIdProspecto($c_cotizacion->getIdProspecto());
    $c_prospecto->obtener_datos();
} else {
    header("Location: ver_ordenes_interna.php");
}
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Ver Detalle de Servicio | Orden Interna | Software de Gestion | Luna Systems Peru</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <?php include 'includes/menu_superior.php' ?>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">

                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Detalle de Servicio @ Orden Interna</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Desarrollo</a></li>
                    <li><a href="ver_ordenes_interna.php">Orden Interna</a></li>
                    <li class="active">Detalle del Servicio</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->

            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">


                <!--Custom Toolbar-->
                <!--===================================================-->
                <div class="col-sm-6 eq-box-sm">
                    <div class="panel ">
                        <div class="panel-heading">
                            <h3 class="panel-title  text-bold">Detalle de la Orden Interna de Servicio</h3>
                        </div>

                        <div class="panel-heading">
                            <div class="col-lg-12">
                                <a href="reg_envio.php" class="btn btn-info"><i class="fa fa-envelope"></i> Solicitar Conformidad</a><!-- en otra ocasion solicitar conformidad envia un correo para q el cliente marque finalizacion dle servicio  -->
                                <a href="procesos/" class="btn btn-warning"><i class="fa fa-check"></i> Aprobar Servicio</a>
                                <a href="reg_hoja_ruta.php" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <p> Nro. Orden Interna: <?php echo $c_orden_interna->getNumeroOrden()?></p>
                                <p> Cliente: <?php echo $c_prospecto->getNombreComercial() . " | " . $c_prospecto->getDatos()?></p>
                                <p> Proyecto: <b><?php echo $c_cotizacion->getDescripcion()?> </b></p>
                                <p> Nro Cotizacion: <?php echo $c_varios->fecha_cotizacion($c_cotizacion->getFecha()) . $c_varios->zerofill($c_cotizacion->getNumero(), 2)?></p>
                                <hr>
                                <p> Duracion: <?php echo $c_orden_interna->getDuracion()?> dias</p>
                                <p> Fecha Inicio: <?php echo $c_orden_interna->getFechaInicio()?></p>
                                <p> Fecha Entrega: <?php echo $c_varios->sumar_dias_fecha($c_orden_interna->getFechaInicio(), $c_orden_interna->getDuracion())?></p>
                                <p> Avance: -125 dias</p>
                                <hr>
                                <p> Total Aprobado: <?php echo $c_orden_interna->getMontoAprobado()?></p>
                                <p> Total Facturado: <?php echo $c_orden_interna->getMontoFacturado()?></p>
                                <p>Estado: <label class="label label-success">Abierto</label></p>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 eq-box-sm">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-bold">Ver Documentos de Pago</h3>
                        </div>
                        <div class="panel-body">
                            <?php if ($c_orden_interna->getMontoFacturado() < $c_orden_interna->getMontoAprobado()) {?>
                            <button type="button" class="btn btn-info" data-target="#demo-default-modal" data-toggle="modal"><i class="fa fa-plus"></i> Agregar</button>
                            <?php } ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($filas_documentos as $filas) {
                                    $documento = $filas['abreviatura'];
                                    $serie = $filas['serie'];
                                    $numero = $filas['numero'];
                                    $documento_completo = $documento . " | " . $c_varios->zerofill($serie, 3) . " - " . $c_varios->zerofill($numero, 4);
                                    $estado = $filas['estado'];
                                    if ($estado == 1) {
                                        $label_estado = '<span class="label label-danger">Pendiente</span>';
                                    }
                                    if ($estado == 2) {
                                        $label_estado = '<span class="label label-success">Pagado</span>';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $documento_completo ?></td>
                                        <td><?php echo $filas['fecha'] ?></td>
                                        <td><?php echo number_format($filas['monto_total'], 2) ?></td>
                                        <td><?php echo $label_estado ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--===================================================-->


            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->


        <!--ASIDE-->
        <!--===================================================-->

        <!--===================================================-->
        <!--END ASIDE-->


        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <?php include 'includes/menu_izquierda.php' ?>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <?php include 'includes/footer.php' ?>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->

<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Agregar Documento de Facturacion</h4>
            </div>
            <form method="post" action="procesos/reg_orden_interna_venta.php">
                <!--Modal body-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="demo-oi-definput" class="control-label text-semibold">Fecha</label>
                        <input type="date" id="demo-oi-definput" name="input_fecha" class="form-control">
                        <input type="hidden" name="hidden_id_prospecto" value="<?php echo $c_cotizacion->getIdProspecto()?>">
                        <input type="hidden" name="hidden_id_orden" value="<?php echo $c_orden_interna->getIdOrdenInterna()?>">
                    </div>
                    <div class="form-group">
                        <label for="demo-oi-definput" class="control-label text-semibold">Documento</label>
                        <select class="form-control" name="select_documento">
                            <option value="1">Nota de Venta</option>
                            <option value="4">Recibo por Honorarios</option>
                            <option value="2">Factura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_empresa" class="control-label text-semibold">Empresa</label>
                        <input type="text" id="input_empresa" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_email" class="control-label text-semibold">Servicio</label>
                        <input type="email" id="input_servicio" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_monto" class="control-label text-semibold">Monto</label>
                        <input type="text" id="input_monto" name="input_monto" class="form-control">
                    </div>
                    <div class="form-group">
                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="checkbox_pagado" checked>
                        <label for="demo-form-checkbox">Pagado</label>
                    </div>
                    <div class="form-group">
                        <label for="select_banco" class="control-label text-semibold">Banco</label>
                        <select class="form-control" name="select_banco">
                            <option value="1">CAJA EFECTIVO</option>
                            <option value="3">BANCO DE CREDITO</option>
                            <option value="2">SCOTIABANK</option>
                        </select>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-primary">Guardar Documento</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="js/jquery.min.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="js/nifty.min.js"></script>

<!--Bootstrap Table Sample [ SAMPLE ]-->
<script src="js/demo/tables-bs-table.js"></script>


<!--Bootstrap Table [ OPTIONAL ]-->
<script src="plugins/bootstrap-table/bootstrap-table.min.js"></script>


<script>
    function estadoFormatter(value, row) {
        if (value == 1) {
            return '<span class="label label-danger">Pendiente</span>';
        }
        if (value == 2) {
            return '<span class="label label-success">Pagado</span>';
        }
    }

</script>


</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

