<?php
require 'clases/cl_alquiler.php';
require 'clases/cl_producto.php';
require 'clases/cl_producto_precio.php';
require 'clases/cl_prospecto.php';
require 'clases_varios/cl_varios.php';

if (filter_input(INPUT_GET, 'id_alquiler')) {
    $c_varios = new cl_varios();
    $c_alquiler = new cl_alquiler();
    $c_producto = new cl_producto();
    $c_producto_precio = new cl_producto_precio();
    $c_prospecto = new cl_prospecto();

    $c_alquiler->setIdAlquiler(filter_input(INPUT_GET, 'id_alquiler'));
    $c_alquiler->obtener_datos();

    $c_producto->setIdProducto($c_alquiler->getIdProducto());
    $c_producto->obtener_datos();

    $c_producto_precio->setIdProductoPrecio($c_alquiler->getIdProductoPrecio());
    $c_producto_precio->obtener_datos();

    $c_prospecto->setIdProspecto($c_alquiler->getIdProspecto());
    $c_prospecto->obtener_datos();
} else {
    header("Location: ver_alquileres.php");
}
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Detalle del Alquiler | Software de Gestion | Luna Systems Peru</title>


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

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->


    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--Alerta SWEEP Alert
    <script src="js/sweet/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="js/sweet/sweetalert2.min.css">-->

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
                    <h1 class="page-header text-overflow">Alquiler de Servicios</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Desarrollo</a></li>
                    <li><a href="ver_alquileres.php">Alquileres</a></li>
                    <li class="active">Detalle del Alquilere</li>
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
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title  text-bold">Detalle del Alquiler</h3>
                        </div>

                        <!--Horizontal Form-->
                        <!--===================================================-->
                        <div class="panel-body">
                            <div class="form-group">
                                <p> Nro. Alquiler: <?php echo $c_alquiler->getIdAlquiler()?></p>
                                <p> Cliente: <?php echo $c_prospecto->getNombreComercial()?></p>
                                <p> Contacto: <?php echo $c_prospecto->getDatos() . " | " . $c_prospecto->getEmail()?></p>
                                <hr>
                                <p> Producto: <b><?php echo $c_producto->getNombre() . " | " . $c_producto_precio->getNombre()?></b></p>
                                <p> Tipo Producto: <b><?php echo $c_producto->getTipoProducto()?></b></p>
                                <p> Plan: <?php echo $c_producto_precio->getTipoPago()?></p>
                                <p> Monto Pactado: <?php echo $c_alquiler->getMontoCuota()?></p>
                                <p> Caracteristicas: <?php echo $c_producto_precio->getCaracteristicas()?></p>
                                <hr>
                                <p> Fecha Inicio: <?php echo $c_varios->fecha_mysql_web($c_alquiler->getFechaInicio())?></p>
                                <p> Fecha Ultimo Pago: <?php echo $c_varios->fecha_mysql_web($c_alquiler->getFechaPago())?></p>
                                <p> Fecha Siguiente Pago: <b><?php echo $c_varios->fecha_mysql_web($c_alquiler->getFechaSiguientePago())?></b></p>
                                <p> Faltante: <?php echo $c_varios->restar_fechas(date("y-m-d"), $c_alquiler->getFechaSiguientePago())?> dias</p>
                                <p> Estado: <label class="label label-success">Activo</label></p>

                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================-->

                <div class="col-sm-6 eq-box-sm">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="panel-title">Detalle de Pagos del Servicio</h1>
                        </div>

                        <!--Horizontal Form-->
                        <!--===================================================-->
                        <div class="panel-body">
                            <button type="button" class="btn btn-info" data-target="#demo-default-modal" data-toggle="modal"><i class="fa fa-plus"></i> Agregar</button>
                            <table id="demo-custom-toolbar" class="demo-add-niftycheck"
                                   data-toggle="table"
                                   data-url="data/alquiler_pagos.php?id_alquiler=<?php echo $c_alquiler->getIdAlquiler() ?>"
                                   data-toolbar="#demo-delete-row"
                                   data-search="false"
                                   data-show-refresh="false"
                                   data-show-toggle="false"
                                   data-show-columns="false"
                                   data-sort-name="fecha"
                                   data-sort-order = "desc"
                                   data-page-list="[20, 50, 100]"
                                   data-page-size="20"
                                   data-pagination="false"
                                   data-show-pagination-switch="false">
                                <thead>
                                <tr>
                                    <th data-field="fecha" data-sortable="true">Fecha</th>
                                    <th data-field="documento" data-sortable="true">Documento</th>
                                    <th data-field="monto" data-sortable="true">Monto</th>
                                    <th data-field="id_pago" data-align="center" data-sortable="false" data-formatter="actionFormatter">Ver</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

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


<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Agregar Documento de Facturacion</h4>
            </div>
            <form method="post" action="procesos/reg_alquiler_venta.php">
                <!--Modal body-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="demo-oi-definput" class="control-label text-semibold">Fecha</label>
                        <input type="date" id="demo-oi-definput" name="input_fecha" class="form-control" value="<?php echo date("Y-m-d")?>">
                        <input type="hidden" name="hidden_id_prospecto" value="<?php echo $c_alquiler->getIdProspecto()?>">
                        <input type="hidden" name="hidden_id_alquiler" value="<?php echo $c_alquiler->getIdAlquiler()?>">
                    </div>
                    <div class="form-group">
                        <label for="demo-oi-definput" class="control-label text-semibold">Documento</label>
                        <select class="form-control" name="select_documento">
                            <option value="1">Nota de Venta</option>
                            <option value="2">Factura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_empresa" class="control-label text-semibold">Empresa</label>
                        <input type="text" id="input_empresa" class="form-control" value="<?php echo $c_prospecto->getNombreComercial()?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_email" class="control-label text-semibold">Servicio</label>
                        <input type="email" id="input_servicio" class="form-control" value="<?php echo $c_producto->getNombre() . " | " . $c_producto_precio->getNombre()?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_monto" class="control-label text-semibold">Monto</label>
                        <input type="text" id="input_monto" name="input_monto" class="form-control" value="<?php echo $c_alquiler->getMontoCuota()?>" readonly>
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
<!--===================================================-->
<!--End Default Bootstrap Modal-->

<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="js/nifty.min.js"></script>


<!--Bootstrap Table Sample [ SAMPLE ]-->
<script src="js/demo/tables-bs-table.js"></script>


<!--Bootstrap Table [ OPTIONAL ]-->
<script src="plugins/bootstrap-table/bootstrap-table.min.js"></script>

<script>
    function actionFormatter(value, row) {
        if (value) {
            return '<button class="btn btn-icon btn-success" title="Modificar Usuario"><i class="fa fa-edit"></i></button> ' +
                '<button type="button" class="btn btn-icon btn-danger" title="Dar de Baja"><i class="fa fa-arrow-down"></i></button>';
        }
    }
</script>
</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

