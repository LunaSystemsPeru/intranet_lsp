<?php
session_start();
$_SESSION['id_usuario'] = 1;
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:37:08 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Software de Gestion | Luna Systems Peru</title>


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
    <link href="../public/css/demo/nifty-demo.min.css" rel="stylesheet">


    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="../public/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

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

                <div class="pad-all text-center">
                    <h3>Bienvenido a la Intranet de Luna Systems</h3>
                    <p>aqui te presentamos un vision general del negocio, "Bendice y Agradece a Dios dia a dia"</p>
                </div>
            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                <div class="row">
                    <div class="col-lg-7">

                        <!--Network Line Chart-->
                        <!--===================================================-->
                        <div id="demo-panel-network" class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Flujo de Dinero en el Año</h3>
                            </div>


                            <!--chart placeholder-->
                            <div class="pad-all">
                                <div id="demo-chart-network" style="height: 255px"></div>
                            </div>


                            <!--Chart information-->
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-lg-8">
                                        <p class="text-semibold text-uppercase text-main">Ingreso Promedio</p>
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <span class="text-3x text-thin text-main" id="monto_venta_promedio">0.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-7 text-sm">
                                                <p>
                                                    <span>Ingreso Minimo</span>
                                                    <span class="pad-lft text-semibold">
					                                        <span class="text-lg" id="monto_venta_minimo">0.00</span>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span>Ingreso Maximo</span>
                                                    <span class="pad-lft text-semibold">
					                                        <span class="text-lg" id="monto_venta_maximo">0.00</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="pad-rgt">
                                            <p class="text-semibold text-uppercase text-main">Today Tips</p>
                                            <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <p class="text-uppercase text-semibold text-main">Pagos Prestamos</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="media pad-btm">
                                                    <div class="media-left">
                                                        <span class="text-2x text-thin text-main">570.00</span>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no">S/ Cuota Total</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-btm">
                                                <div class="clearfix">
                                                    <p class="pull-left mar-no">Pagando</p>
                                                    <p class="pull-right mar-no">70%</p>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-info" style="width: 70%;">
                                                        <span class="sr-only">70% Pagado</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--===================================================-->
                        <!--End network line chart-->

                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">

                                <!--Sparkline Area Chart-->
                                <div class="panel panel-success panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-semibold"><i class="demo-pli-data-storage icon-fw"></i> Ordenes Internas</p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="total_ordenes">0.00</span> S/ total
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="cantidad_ordenes">0</span> nro de ordenes
                                        </p>
                                    </div>
                                    <div class="pad-top text-center">
                                        <!--Placeholder-->
                                        <div id="demo-sparkline-area" class="sparklines-full-content"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">

                                <!--Sparkline Line Chart-->
                                <div class="panel panel-info panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-semibold">Alquileres</p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="total_cobrar_alquiler" >0.00</span> total cobrar S/
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="total_pagado_alquiler">0.00</span> total pagado S/
                                        </p>
                                    </div>
                                    <div class="pad-top text-center">

                                        <!--Placeholder-->
                                        <div id="demo-sparkline-line" class="sparklines-full-content"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">

                                <!--Sparkline bar chart -->
                                <div class="panel panel-purple panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-semibold"><i class="demo-pli-basket-coins icon-fw"></i> Ventas</p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="total_soles_venta_mes">0.00</span> Total S/
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="total_doc_venta_mes">0</span> Nro Documentos
                                        </p>
                                    </div>
                                    <div class="text-center">

                                        <!--Placeholder-->
                                        <div id="demo-sparkline-bar" class="box-inline"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">

                                <!--Sparkline pie chart -->
                                <div class="panel panel-warning panel-colorful">
                                    <div class="pad-all">
                                        <p class="text-lg text-semibold">Cumplimiento</p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold" id="monto_porfacturar">0.00</span> Por Facturar S/
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">1206.00</span> Por Pagar S/
                                        </p>
                                    </div>
                                    <div class="pad-all">
                                        <div class="pad-btm">
                                            <div class="progress progress-sm">
                                                <div style="width: 65%;" class="progress-bar progress-bar-light">
                                                    <span class="sr-only">65.42%</span> <!-- aqui va el porcentaje por facturar total por facturar / total servicios (solo servicios activo) -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pad-btm">
                                            <div class="progress progress-sm">
                                                <div style="width: 10%;" class="progress-bar progress-bar-light">
                                                    <span class="sr-only">10%</span><!-- aqui va el porcentaje por pagar total por pagar / total compras solo activos-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Extra Small Weather Widget-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div class="panel">
                            <div class="panel-body text-center clearfix">
                                <div class="col-sm-4 pad-top">
                                    <div class="text-lg">
                                        <p class="text-5x text-thin text-main" id="monto_saldo_actual">0.00</p>
                                    </div>
                                    <p class="text-sm text-bold text-uppercase">Saldo Actual</p>
                                </div>
                                <div class="col-sm-8">
                                    <a href="ver_gastos.php" class="btn btn-pink mar-ver">Ver Gastos</a>
                                    <p class="text-xs">Por Pagar</p>
                                    <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                                        <li class="col-xs-6">
                                            <span class="text-lg text-semibold text-main" id="deuda_contratos">750.00</span>
                                            <p class="text-sm text-muted mar-no">Contratos</p>
                                        </li>
                                        <li class="col-xs-6">
                                            <span class="text-lg text-semibold text-main" id="deuda_frecuentes">456.00</span>
                                            <p class="text-sm text-muted mar-no">Frecuentes</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Extra Small Weather Widget-->


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-warning panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-pli-file-word icon-3x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold">241</p>
                                <p class="mar-no">Documents</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-info panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-pli-file-zip icon-3x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold">241</p>
                                <p class="mar-no">Zip Files</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-mint panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-pli-camera-2 icon-3x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold">241</p>
                                <p class="mar-no">Photos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-danger panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-pli-video icon-3x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold">241</p>
                                <p class="mar-no">Videos</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <!--List Todo-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <div class="panel panel-trans">
                            <div class="panel-heading">
                                <h3 class="panel-title">To do list</h3>
                            </div>
                            <div class="pad-ver">
                                <ul class="list-group bg-trans list-todo mar-no">
                                    <li class="list-group-item">
                                        <input id="demo-todolist-1" class="magic-checkbox" type="checkbox">
                                        <label for="demo-todolist-1"><span>Find an idea. <span class="label label-danger">Important</span></span></label>
                                    </li>
                                    <li class="list-group-item">
                                        <input id="demo-todolist-2" class="magic-checkbox" type="checkbox" checked>
                                        <label for="demo-todolist-2"><span>Do some work</span></label>
                                    </li>
                                    <li class="list-group-item">
                                        <input id="demo-todolist-3" class="magic-checkbox" type="checkbox">
                                        <label for="demo-todolist-3"><span>Read the book</span></label>
                                    </li>
                                    <li class="list-group-item">
                                        <input id="demo-todolist-4" class="magic-checkbox" type="checkbox">
                                        <label for="demo-todolist-4"><span>Upgrade server <span class="label label-warning">Warning</span></span></label>
                                    </li>
                                    <li class="list-group-item">
                                        <input id="demo-todolist-5" class="magic-checkbox" type="checkbox" checked>
                                        <label for="demo-todolist-5"><span>Redesign my logo <span class="label label-info">2 Mins</span></span></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="input-group pad-all">
                                <input type="text" class="form-control" placeholder="New task" autocomplete="off">
                                <span class="input-group-btn">
					                    <button type="button" class="btn btn-success"><i class="demo-pli-add"></i></button>
					                </span>
                            </div>
                        </div>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End todo list-->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="panel panel-trans">
                            <div class="panel-heading">
                                <div class="panel-control">
                                    <a title="" data-html="true" data-container="body" data-original-title="&lt;p class='h4 text-semibold'&gt;Information&lt;/p&gt;&lt;p style='width:150px'&gt;This is an information bubble to help the user.&lt;/p&gt;" href="#" class="demo-psi-information icon-lg icon-fw unselectable text-info add-tooltip"></a>
                                </div>
                                <h3 class="panel-title">Services</h3>
                            </div>
                            <div class="bord-btm">
                                <ul class="list-group bg-trans">
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input id="demo-online-status-checkbox" class="toggle-switch" type="checkbox" checked>
                                            <label for="demo-online-status-checkbox"></label>
                                        </div>
                                        Online status
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input id="demo-show-off-contact-checkbox" class="toggle-switch" type="checkbox" checked>
                                            <label for="demo-show-off-contact-checkbox"></label>
                                        </div>
                                        Show offline contact
                                    </li>
                                    <li class="list-group-item">
                                        <div class="pull-right">
                                            <input id="demo-show-device-checkbox" class="toggle-switch" type="checkbox">
                                            <label for="demo-show-device-checkbox"></label>
                                        </div>
                                        Show my device icon
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="pad-btm">
                                    <p class="text-semibold text-main">Upgrade Progress</p>
                                    <div class="progress progress-md">
                                        <div class="progress-bar progress-bar-purple" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;" role="progressbar">
                                            <span class="sr-only">15%</span>
                                        </div>
                                    </div>
                                    <small>15% Completed</small>
                                </div>
                                <div>
                                    <p class="text-semibold text-main">Database</p>
                                    <div class="progress progress-md">
                                        <div class="progress-bar progress-bar-success" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;" role="progressbar">
                                            <span class="sr-only">70%</span>
                                        </div>
                                    </div>
                                    <small>70% Completed</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12 col-lg-4'>
                        <div class="panel panel-trans">
                            <div class="pad-all">
                                <div class="media mar-btm">
                                    <div class="media-left">
                                        <img src="../public/img/profile-photos/2.png" class="img-md img-circle" alt="Avatar">
                                    </div>
                                    <div class="media-body">
                                        <p class="text-lg text-main text-semibold mar-no">Ralph West</p>
                                        <p>Project manager</p>
                                    </div>
                                </div>
                                <blockquote class="bq-sm bq-open bq-close">Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</blockquote>
                            </div>

                            <div class="bord-top">
                                <ul class="list-group bg-trans bord-no">
                                    <li class="list-group-item list-item-sm">
                                        <div class="media-left">
                                            <i class="demo-psi-facebook icon-lg"></i>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" class="btn-link text-semibold">Facebook</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-item-sm">
                                        <div class="media-left">
                                            <i class="demo-psi-twitter icon-lg"></i>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" class="btn-link text-semibold">@RalphWe</a>
                                            <br> Design my themes with <a href="#" class="btn-link text-bold">#Bootstrap</a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                        </div>
                                    </li>
                                    <li class="list-group-item list-item-sm">
                                        <div class="media-left">
                                            <i class="demo-psi-instagram icon-lg"></i>
                                        </div>
                                        <div class="media-body">
                                            <a href="#" class="btn-link text-semibold">Ralphz</a>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-item-sm">
                                        <div class="media-body">

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Order Status</h3>
                            </div>

                            <!--Data Table-->
                            <!--===================================================-->
                            <div class="panel-body">
                                <table id="demo-custom-toolbar" class="demo-add-niftycheck" data-toggle="table"
                                       data-url="../data/tables/ordenes_internas.php?tipo=2"
                                       data-search="true"
                                       data-show-refresh="true"
                                       data-show-toggle="true"
                                       data-show-columns="false"
                                       data-sort-name="fecha_termino"
                                       data-page-list="[20, 50, 100]"
                                       data-page-size="20"
                                       data-pagination="true" data-show-pagination-switch="true">
                                    <thead>
                                    <tr>
                                        <th data-field="numero_orden_interna" data-sortable="true">Codigo</th>
                                        <th data-field="descripcion" data-sortable="true">Servicio</th>
                                        <!--<th data-field="fecha_inicio" data-align="center" data-sortable="true" >F. Inicio</th>-->
                                        <th data-field="fecha_termino" data-align="center" data-sortable="true" >F. Entrega</th>
                                        <th data-field="monto_aprobado" data-align="center" data-sortable="true">Monto</th>
                                        <th data-field="dias_restantes" data-align="center" data-sortable="true" data-formatter="diasFormatter">Plazo</th>
                                        <th data-field="porcentaje_pago" data-align="center" data-sortable="true" data-formatter="montoFormatter">Facturado</th>
                                        <th data-field="diferencia" data-align="right" data-sortable="true" data-formatter="diferenciaFormatter">Diferencia</th>
                                        <th data-field="id_orden_interna" data-align="center" data-sortable="false" data-formatter="actionFormatter">Acciones</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <!--===================================================-->
                            <!--End Data Table-->

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
        <!--===================================================  aqui va el menu derecha -->
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


<!--Flot Chart [ OPTIONAL ]-->
<script src="../public/plugins/flot-charts/jquery.flot.min.js"></script>
<script src="../public/plugins/flot-charts/jquery.flot.resize.min.js"></script>
<script src="../public/plugins/flot-charts/jquery.flot.tooltip.min.js"></script>



<!--Bootstrap Table [ OPTIONAL ]-->
<script src="../public/plugins/bootstrap-table/bootstrap-table.min.js"></script>

<!--Sparkline [ OPTIONAL ]-->
<script src="../public/plugins/sparkline/jquery.sparkline.min.js"></script>


<!--Specify page [ SAMPLE ]-->
<script src="../public/js/demo/dashboard.js"></script>

<script>
    function montoFormatter(value, row) {
        if (value == 0) {
            return '<span class="label label-danger">'+value * 100+' %</span>';
        }
        if (value > 0 & value < 1) {
            return '<span class="label label-warning">'+new Intl.NumberFormat().format(value * 100) +' %</span>';
        }
        if (value == 1) {
            return '<span class="label label-success">'+value * 100+' %</span>';
        }
    }

    function diasFormatter(value, row) {
        if (value < 1) {
            return '<span class="label label-danger">'+value+' dias</span>';
        }
        if (value == 0 & value > 1) {
            return '<span class="label label-warning">'+value+' dias</span>';
        }

        if (value > 0) {
            return '<span class="label label-success">'+value+' dias</span>';
        }
    }

    function diferenciaFormatter(value, row) {
        if (value <= 0 ) {
            return '-';
        }

        if (value > 0) {
            return value;
        }
    }

    function actionFormatter(value, row) {
        if (value) {
            return '<a href="ver_detalle_orden_interna.php?id_orden_interna=' + value + '" class="btn btn-icon btn-success" title="Ver Detalle de Orden Interna"><i class="fa fa-eye"></i></a> ';
        }
    }

</script>

</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:39:18 GMT -->
</html>
