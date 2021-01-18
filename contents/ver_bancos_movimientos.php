<?php
require '../models/cl_banco.php';
$c_banco = new cl_banco();

$c_banco->setIdBanco(filter_input(INPUT_GET, 'id_banco'));
$c_banco->obtener_datos();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Movimientos del Banco | Software de Gestion | Luna Systems Peru</title>


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
                    <h1 class="page-header text-overflow">Movimientos del Banco: <?php echo $c_banco->getNombre() ?> </h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="ver_bancos.php">Banco</a></li>
                    <li class="active">Movimientos del Banco</li>
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
                        <a href="ver_bancos.php" id="demo-delete-row2" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Ver Bancos</a>
                        <button type="button" id="demo-delete-row" class="btn btn-success" data-target="#demo-default-modal" data-toggle="modal"><i class="fa fa-arrow-circle-left"></i> Transferencia a otro Banco</button>
                        <table id="demo-custom-toolbar" class="demo-add-niftycheck"
                               data-toggle="table"
                               data-url="../data/tables/bancos_movimientos.php?id_banco=<?php echo $c_banco->getIdBanco() ?>"
                               data-toolbar="#demo-delete-row"
                               data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="false"
                               data-page-list="[20, 50, 100]"
                               data-page-size="20"
                               data-pagination="true"
                               data-show-pagination-switch="true">
                            <thead>
                            <tr>
                                <th data-field="id_movimiento" data-sortable="false">ID</th>
                                <th data-field="fecha" data-align="center" data-sortable="false">Fecha</th>
                                <th data-field="descripcion" data-sortable="false">Descripcion</th>
                                <th data-field="ingresa" data-align="right" data-sortable="false">Ingresa S/</th>
                                <th data-field="sale" data-align="right" data-sortable="false">Sale S/</th>
                                <th data-field="saldo" data-align="right" data-sortable="false">Saldo S/</th>
                                <th data-field="nom_clasificacion" data-align="center" data-sortable="false">Clasificacion</th>
                                <th data-field="id_movimiento" data-align="center" data-sortable="false" data-formatter="actionFormatter">Acciones</th>
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

<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Realizar Transferencia!</h4>
            </div>

            <form class="form-horizontal" method="POST" action="../controller/reg_trasnsferencia.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Banco Destino</label>
                        <div class="col-lg-7">
                            <select class="form-control" name="select_banco" id="select_banco">
                                <?php
                                $a_bancos = $c_banco->verOtrosBancos();
                                foreach ($a_bancos as $fila) {
                                    ?>
                                    <option value="<?php echo $fila['id_banco']?>"><?php echo $fila['nombre'] . " - " . $fila['nro_cuenta']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" name="hidden_banco_origen" value="<?php echo $c_banco->getIdBanco() ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Fecha</label>
                        <div class="col-lg-7">
                            <input type="date" class="form-control text-center" name="input_fecha" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Monto Disponible</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control text-right" name="input_monto_disponible" value="<?php echo number_format($c_banco->getMonto(), 2)?>" readonly/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Monto</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control text-right" name="input_monto" required/>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-primary">Enviar Dinero</button>
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

    function actionFormatter(value, row) {
        if (value) {
            return '<a href="mod_prospecto.php?id_prospecto=' + value + '" class="btn btn-icon btn-info" title="Editar Producto"><i class="fa fa-edit"></i></a> ' +
                '<a href=' + value + '"ver_detalle_prospecto.php?id_prospecto=" class="btn btn-icon btn-success" title="Ver Precios"><i class="fa fa-eye"></i></a>';
        }
    }
</script>


</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

