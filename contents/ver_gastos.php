<?php
require '../models/cl_clasificacion_movimientos.php';
require '../models/cl_banco.php';

$c_clasificacion = new cl_clasificacion_movimientos();
$c_banco = new cl_banco();

?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gastos no doccumentados | Software de Gestion | Luna Systems Peru</title>


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
                    <h1 class="page-header text-overflow">Gastos no Documentados</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Gastos</a></li>
                    <li class="active">Gastos no documentados</li>
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
                        <button type="button" data-target="#demo-default-modal" data-toggle="modal" id="demo-delete-row" class="btn btn-success"><i class="demo-pli-check"></i> Agregar</button>
                        <select class="form-control" id="demo-delete-row2"><option>201911</option></select>
                        <table id="demo-custom-toolbar" class="demo-add-niftycheck"
                               data-toggle="table"
                               data-url="../data/tables/gastos.php"
                               data-toolbar="#demo-delete-row"
                               data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="false"
                               data-sort-name="fecha"
                               data-page-list="[20, 50, 100]"
                               data-page-size="20"
                               data-pagination="true"
                               data-show-pagination-switch="true">
                            <thead>
                            <tr>
                                <th data-field="id_movimiento" data-sortable="true">ID</th>
                                <th data-field="fecha" data-align="center" data-sortable="true">Fecha</th>
                                <th data-field="banco" data-align="center" data-sortable="true">Caja/Banco</th>
                                <th data-field="descripcion" data-align="left" data-sortable="true">Descripcion</th>
                                <th data-field="monto" data-align="right" data-sortable="true">Monto</th>
                                <th data-field="clasificacion" data-align="center" data-sortable="true">Clasificacion</th>
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


<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Agregar Gasto</h4>
            </div>
            <form method="post" action="../controller/reg_gasto.php">
                <!--Modal body-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="demo-oi-definput" class="control-label text-semibold">Fecha</label>
                        <input type="date" id="demo-oi-definput" name="input_fecha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select_banco" class="control-label text-semibold">Banco</label>
                        <select class="form-control" name="select_banco">
                            <?php
                            foreach ($c_banco->verFilas() as $value) {
                                ?>
                                <option value="<?php echo $value['id_banco'] ?>"><?php echo $value['nombre'] . " - Actual S/ " . number_format($value['monto'], 2) ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_descripcion" class="control-label text-semibold">Descripcion</label>
                        <input type="text" id="input_descripcion" name="input_descripcion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="input_monto" class="control-label text-semibold">Monto</label>
                        <input type="text" id="input_monto" name="input_monto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select_clasificacion" class="control-label text-semibold">Clasificacion:</label>
                        <select class="form-control" id="select_clasificacion" name="select_clasificacion">
                            <?php
                            foreach ($c_clasificacion->verFilas() as $value) {
                                ?>
                                <option value="<?php echo $value['id_clasificacion'] ?>"><?php echo $value['nombre'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
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
    function actionFormatter(value, row) {
        if (value) {
            return '<button type="button" onclick="eliminar('+value+')" class="btn btn-icon btn-danger" title="Eliminar Gasto"><i class="fa fa-trash"></i></button> ';
        }
    }

    function eliminar(codigo) {
        window.location.href = "../controller/reg_gasto.php?id_movimiento=" + codigo;
    }

    function SumarColumna(grilla, columna) {

        var resultVal = 0.0;

        $("#" + grilla + " tbody tr").not(':first').not(':last').each(
            function() {

                var celdaValor = $(this).find('td:eq(' + columna + ')');

                if (celdaValor.val() != null)
                    resultVal += parseFloat(celdaValor.html().replace(',','.'));

            } //function

        ) //each

        $("#" + grilla + " tbody tr:last td:eq(" + columna + ")").html(resultVal.toFixed(2).toString().replace('.',','));

    }
</script>


</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

