<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Cotizaciones | Software de Gestion | Luna Systems Peru</title>


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
                    <h1 class="page-header text-overflow">Cotizacion @ Clientes</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Ventas</a></li>
                    <li class="active">Cotizacion</li>
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
                        <h3 class="panel-title text-bold">Agregar Cotizacion</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="procesos/reg_cotizacion.php">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Fecha</label>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control" name="input_fecha" required/>
                                </div>
                                <label class="col-lg-2 control-label">Numero</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" name="input_numero" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Empresa</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="input_empresa" id="input_empresa" required/>
                                    <input type="hidden" name="input_id_prospecto" id="input_id_prospecto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Representante</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="input_prospecto" id="input_prospecto" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="input_email" id="input_email" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Servicio</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="input_servicio" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Duracion (dias)</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" name="input_duracion" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tipo Pago</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="select_tipo_pago">
                                        <option value="1">A Convenir</option>
                                        <option value="2">40% Adelanto resto contraentrega</option>
                                        <option value="3">Por Avance</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Total S/:</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" name="input_total" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Archivo WORD:</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-control" name="input_archivo_doc" required/>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="15728640" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Archivo PDF:</label>
                                <div class="col-lg-9">
                                    <input type="file" class="form-control" name="input_archivo_pdf" required/>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="15728640" />
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </form>
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

<script>
    $(function () {
        $("#input_empresa").autocomplete({
            source: "data-inputs/buscar_prospectos.php",
            minLength: 2,
            select: function (event, ui) {
                event.preventDefault();
                $('#input_id_prospecto').val(ui.item.codigo);
                $('#input_empresa').val(ui.item.empresa);
                $('#input_prospecto').val(ui.item.datos);
                $('#input_email').val(ui.item.email);
            }
        });
    });
</script>

</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

