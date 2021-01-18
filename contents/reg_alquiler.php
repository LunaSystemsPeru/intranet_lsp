<?php
require '../models/cl_producto.php';
$c_producto = new cl_producto();
$a_productos = $c_producto->ver_filas();
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Alquiler | Software de Gestion | Luna Systems Peru</title>


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


    <!--=================================================-->


    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="../public/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="../public/plugins/pace/pace.min.js"></script>
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
                    <h1 class="page-header text-overflow">Alquiler Producto @ Clientes</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Proyectos</a></li>
                    <li class="active">Alquiler</li>
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
                        <h3 class="panel-title text-bold">Agregar Alquiler de Producto</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="../controller/reg_alquiler.php">
                        <div class="panel-body">
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
                                <label class="col-lg-2 control-label">Fecha Inicio</label>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control" name="input_fecha" value="<?php echo date("Y-m-d") ?>" required/>
                                </div>
                                <input id="demo-form-checkbox" class="magic-checkbox " type="checkbox" name="checkbox_pagado" checked>
                                <label for="demo-form-checkbox" class="control-label">Saltar 1er Pago</label>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Producto</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="select_producto" id="select_producto" onchange="cargar_subproductos()">
                                        <?php
                                        foreach ($a_productos as $fila) {
                                            $tipo = $fila['tipo_producto'];
                                            if ($tipo == 1) {
                                                $vtipo = "ESCRITORIO";
                                            }
                                            if ($tipo == 2) {
                                                $vtipo = "WEB/SAAS";
                                            }
                                            if ($tipo == 3) {
                                                $vtipo = "CERTIFICADO DIGITAL";
                                            }
                                            if ($tipo == 4) {
                                                $vtipo = "APP MOVIL";
                                            }
					    if ($tipo == 5) {
                                                $vtipo = "ASESORIA";
                                            }
					    if ($tipo == 6) {
                                                $vtipo = "CAPACITACION";
                                            }	
					    if ($tipo == 7) {
                                                $vtipo = "AUDITORIA";
                                            }			
                                            ?>
                                            <option value="<?php echo $fila['id_producto'] ?>"><?php echo $fila['nombre'] . " | " . $vtipo ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Sub Producto</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="select_sub_producto" id="select_sub_producto" onchange="cargar_datos_subproducto()">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Descripcion</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" readonly value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Periodo Cobro</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" id="input_duracion" name="input_duracion" readonly value=""/>
                                    <input type="hidden" id="id_tipo_pago" name="id_tipo_pago" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Total S/:</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" id="input_total"  name="input_total" value="0.00"/>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="../public/js/bootstrap.min.js"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="../public/js/nifty.min.js"></script>

<script>
    $(function () {
        $("#select_producto").trigger('change');

        $("#input_empresa").autocomplete({
            source: "../data/inputs/buscar_prospectos.php",
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

    /*
        $("#select_producto").change(function () {
            cargar_subproductos();
        });
    */
    function cargar_subproductos() {
        var idproducto = $("#select_producto").val();
        var select_subproducto = $("#select_sub_producto");
        if (idproducto !== '') {
            $.ajax({
                data: {id: idproducto},
                url: '../data/selects/sub_producto.php',
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    select_subproducto.prop('disabled', true)
                },
                success: function (r) {
                    // Limpiamos el select
                    select_subproducto.find('option').remove();
                    $(r).each(function (i, v) { // indice, valor
                        select_subproducto.append('<option value="' + v.id_productos_precio + '">' + v.nombre + " | " + v.precio + '</option>');
                    });
                    select_subproducto.prop('disabled', false);
                    cargar_datos_subproducto();
                },
                error: function () {
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        } else {
            alert("ERROR!! - Cliente no se reconoce")
        }
    }

    function cargar_datos_subproducto() {
        var id_subproducto = $("#select_sub_producto").val();
        if (id_subproducto !== '') {
            $.ajax({
                data: {id: id_subproducto},
                url: '../data/inputs/datos_sub_producto.php',
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $("#select_sub_producto").prop('disabled', true)
                },
                success: function (r) {
                    var periodo = "";
                    // Limpiamos el select
                    if (r["tipo_pago"] == 3) {
                        periodo = "ANUAL";
                    }
		    if (r["tipo_pago"] == 1) {
                        periodo = "CONTADO";
                    }
		    if (r["tipo_pago"] == 2) {
                        periodo = "MENSUAL";
                    }
                    $("#input_total").val(r["precio"]);
                    $("#input_descripcion").val(r["caracteristicas"]);
                    $("#id_tipo_pago").val(r["tipo_pago"]);
                    $("#input_duracion").val(periodo);
                    $("#select_sub_producto").prop('disabled', false)
                },
                error: function () {
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        } else {
            alert("ERROR!! - Cliente no se reconoce")
        }

    }
</script>

</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

