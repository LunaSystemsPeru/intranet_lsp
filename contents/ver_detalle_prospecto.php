<?php
require '../models/cl_prospecto.php';
$c_prospecto = new cl_prospecto();

if (filter_input(INPUT_GET, 'id_prospecto')) {
    $c_prospecto->setIdProspecto(filter_input(INPUT_GET, 'id_prospecto'));
    $c_prospecto->obtener_datos();
} else {
    header("Location: ver_cotizaciones.php");
}
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Prospecto | Software de Gestion | Luna Systems Peru</title>


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

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="../public/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../public/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../public/plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->


    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="../public/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../public/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../public/plugins/pace/pace.min.js"></script>
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
                    <h1 class="page-header text-overflow">Prospecto @ Cliente</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Ventas</a></li>
                    <li><a href="ver_prospectos.php">Prospectos</a></li>
                    <li class="active">Detalle del Prospecto</li>
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
                    <div class="panel-heading">
                        <br>
                        <div class="col-lg-12">
                            <div class="btn-group">
                                <a href="ver_prospectos.php" class="btn btn-dark"><i class="fa fa-arrow-left"></i> ver Prospectos</a>
                            </div>
                            <div class="btn-group">
                                <a href="mod_prospecto.php?id_prospecto=<?php echo $c_prospecto->getIdProspecto()?>" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                            </div>
                            <div class="btn-group">
                                <a href="../controller/del_prospecto.php?input_codigo=<?php echo $c_prospecto->getIdProspecto()?>" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <div class="panel-body">
                        <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Contacto</label>
                            <div class="col-lg-3">
                                <label><?php echo $c_prospecto->getDatos() ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Telefono</label>
                            <div class="col-lg-3">
                                <p><?php echo $c_prospecto->getCelular() ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-3">
                                <p><?php echo $c_prospecto->getEmail() ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">RUC:</label>
                            <div class="col-lg-3">
                                <p><?php echo $c_prospecto->getRuc() ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Razon Social</label>
                            <div class="col-lg-3">
                                <p><?php echo $c_prospecto->getRazonSocial() ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Direccion</label>
                            <div class="col-lg-3">
                                <p><?php echo $c_prospecto->getDireccion() ?></p>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--===================================================-->

                <div class="panel">
                    <div class="panel-heading">
                        <h1 class="panel-title">Claves de acceso del Prospecto</h1>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <div class="panel-body">
                        <button id="demo-delete-row" class="btn btn-info" data-target="#demo-default-modal" data-toggle="modal"  ><i class="demo-pli-add"></i> Agregar</button>
                        <table id="demo-custom-toolbar" class="demo-add-niftycheck"
                               data-toggle="table"
                               data-url="../data/tables/prospecto_accesos.php?id_prospecto=<?php echo $c_prospecto->getIdProspecto()?>"
                               data-toolbar="#demo-delete-row"
                               data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="false"
                               data-sort-name="nombre"
                               data-page-list="[20, 50, 100]"
                               data-page-size="20"
                               data-pagination="true"
                               data-show-pagination-switch="true">
                            <thead>
                            <tr>
                                <th data-field="nombre" data-sortable="true">Nombre</th>
                                <th data-field="url" data-sortable="true">URL</th>
                                <th data-field="usuario" data-sortable="true" >Usuario</th>
                                <th data-field="contrasena" data-align="center" data-sortable="true" >Contraseña</th>
                                <th data-field="id_acceso" data-align="center" data-sortable="false" data-formatter="actionFormatter">Acciones</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
            <!--===================================================-->
            <!--End page content-->

            <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!--Modal header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                            <h4 class="modal-title">Agregar Datos de acceso!</h4>
                        </div>

                        <form class="form-horizontal" method="POST" action="../controller/reg_prospecto_acceso.php">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nombre Acceso</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="input_nombre" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">URL Acceso</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="input_url" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Usuario</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="input_usuario" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Clave Acceso</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="input_clave" required/>
                                        <input type="hidden" name="hidden_id_prospecto" value="<?php echo $c_prospecto->getIdProspecto()?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                                <button class="btn btn-primary">Generar OTI</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

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
                <h4 class="modal-title">Aprobar Cotizacion!</h4>
            </div>

            <form class="form-horizontal" method="POST" action="../controller/reg_orden_interna.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Fecha Inicio</label>
                        <div class="col-lg-7">
                            <input type="date" class="form-control text-center" name="input_fecha" required/>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-primary">Generar OTI</button>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="../public/js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="../public/js/nifty.min.js"></script>


<!--Bootstrap Table Sample [ SAMPLE ]-->
<script src="../public/js/demo/tables-bs-table.js"></script>


<!--Bootstrap Table [ OPTIONAL ]-->
<script src="../public/plugins/bootstrap-table/bootstrap-table.min.js"></script>

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

