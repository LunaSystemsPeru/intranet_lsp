<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Pagos Frecuentes | Software de Gestion | Luna Systems Peru</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="../public/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="../public/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../public/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../public/plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->


    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="../public/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


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
    <?php include '../fixed/menu_superior.php' ?>
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
                    <h1 class="page-header text-overflow">Pagos Frecuentes</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Gastos</a></li>
                    <li class="active">Pagos Frecuentes</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->

            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">


                <!--Custom Toolbar-->
                <!--===================================================-->
                <div class="panel">
                    <div class="panel-body">
                        <a href="reg_pago_frecuente.php" id="demo-delete-row" class="btn btn-success"><i class="demo-pli-check"></i> Agregar</a>
                        <table id="demo-custom-toolbar" class="demo-add-niftycheck"
                               data-toggle="table"
                               data-url="../data/tables/pagos_frecuentes.php"
                               data-toolbar="#demo-delete-row"
                               data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="false"
                               data-sort-name="fecha_recordatorio"
                               data-page-list="[20, 50, 100]"
                               data-page-size="20"
                               data-pagination="true"
                               data-show-footer="true"
                               data-show-pagination-switch="true">
                            <thead>
                            <tr>
                                <th data-field="id_frecuente" data-sortable="true">ID</th>
                                <th data-field="fecha_recordatorio" data-align="center" data-sortable="true">Fecha Vcto</th>
                                <th data-field="datos_servicio" data-align="left" data-sortable="true">Servicio</th>
                                <th data-field="dias_faltante" data-sortable="true" data-align="center" data-formatter="diasFormatter">Dias Falt.</th>
                                <th data-field="total" data-align="right" data-sortable="true" data-footer-formatter="sumTotalFormatter">Total</th>
                                <th data-field="porcentaje_pagado" data-align="center" data-sortable="true" data-formatter="montoFormatter">% Pagado</th>
                                <th data-field="pendiente" data-align="right" data-sortable="true" data-footer-formatter="sumPendienteFormatter">Por Pagar</th>
                                <th data-field="id_frecuente" data-align="center" data-sortable="false" data-formatter="actionFormatter">Acciones</th>
                            </tr>
                            </thead>
                        </table>
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
        <?php include '../fixed/menu_izquierda.php' ?>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <?php include '../fixed/footer.php' ?>
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
                <h4 class="modal-title">Ver Pagos de este Periodo</h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Item</th>
                        <th>Fecha</th>
                        <th>Banco</th>
                        <th>Monto</th>
                        <th>Restante</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>2019-12-21</td>
                        <td>EFECTIVO SOLES</td>
                        <td>200.00</td>
                        <td>806.00</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

                <button class="btn btn-success" type="button" onclick="agregar_pago()"><i class="fa fa-plus"></i> Agregar Pago</button>
            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>

            </div>
        </div>
    </div>
</div>

<!--reg pago del pago frecuente-->
<div class="modal fade" id="modal-pago-frecuente" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Agregar Pagos</h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">

            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>

            </div>
        </div>
    </div>
</div>

<!--JAVASCRIPT-->
<!--=================================================-->

<!--jQuery [ REQUIRED ]-->
<script src="../public/js/jquery.min.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="../public/js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="../public/js/nifty.min.js"></script>


<!--=================================================-->

<!--Demo script [ DEMONSTRATION ]-->


<!--Bootstrap Table Sample [ SAMPLE ]-->
<script src="../public/js/demo/tables-bs-table.js"></script>


<!--X-editable [ OPTIONAL ]-->
<script src="../public/plugins/x-editable/js/bootstrap-editable.min.js"></script>


<!--Bootstrap Table [ OPTIONAL ]-->
<script src="../public/plugins/bootstrap-table/bootstrap-table.min.js"></script>


<!--Bootstrap Table Extension [ OPTIONAL ]-->
<script src="../public/plugins/bootstrap-table/extensions/editable/bootstrap-table-editable.js"></script>

<script>
    function montoFormatter(value, row) {
        if (value == 0) {
            return '<span class="label label-danger">' + value * 100 + ' %</span>';
        }
        if (value > 0 & value < 1) {
            return '<span class="label label-warning">' + new Intl.NumberFormat().format(value * 100) + ' %</span>';
        }
        if (value == 1) {
            return '<span class="label label-success">' + value * 100 + ' %</span>';
        }
    }

    function diasFormatter(value, row) {
        if (value < 1) {
            return '<span class="label label-danger">' + value + ' dias</span>';
        }
        if (value == 0 & value > 1) {
            return '<span class="label label-warning">' + value + ' dias</span>';
        }

        if (value > 0) {
            return '<span class="label label-success">' + value + ' dias</span>';
        }
    }

    function actionFormatter(value, row) {
        if (value) {
            return '<a href="ver_detalle_pago_frecuente.php?id_frecuente=' + value + '" class="btn btn-icon btn-info" title="Ver Detalle de Pago Frecuente"><i class="fa fa-eye"></i></a>';
        }
    }

    function pendienteFormatter (value, row) {
        if (value) {
            return toFixed(value);
        }
    }

    function llamar_modal(codigo) {
        $("#demo-default-modal").modal("toggle");
    }

    function sumTotalFormatter(data) {
        field = this.field;
        return data.reduce(function(sum, row) {
            //return Number.parseFloat(sum + (+row[field])).toFixed(2);
            return (sum + (+row[field]));
        }, 0);
    }

    function sumPendienteFormatter(data) {
        field = this.field;
        return data.reduce(function(sum, row) {
            //return Number.parseFloat(sum + (+row[field])).toFixed(2);
            return (sum + (+row[field]));
        }, 0);
    }

    function agregar_pago () {
        $('#modal-pago-frecuente').modal("toggle");
    }
</script>


</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

