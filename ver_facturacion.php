<!DOCTYPE html>
<html lang="es">



<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Facturacion Venta | Software de Gestion | Luna Systems Peru</title>


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


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->

        
    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


    <!--Font Awesome [ OPTIONAL ]-->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--X-editable [ OPTIONAL ]-->
    <link href="plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">

    
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
                        <h1 class="page-header text-overflow">Facturacion @ Clientes</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Ventas</a></li>
					<li class="active">Facturacion</li>
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
                            <a href="reg_documento_venta.php" id="demo-delete-row" class="btn btn-info" ><i class="demo-pli-add"></i> Agregar</a>
                            <select class="form-control">
                                <option>Seleccione Periodo</option>
                            </select>
					        <table id="demo-custom-toolbar" class="demo-add-niftycheck" data-toggle="table"
					               data-url="data/facturacion.php"
					               data-toolbar="#demo-delete-row"
					               data-search="true"
					               data-show-refresh="true"
					               data-show-toggle="true"
					               data-show-columns="false"
					               data-sort-name="fecha"
                                   data-sort-order = "desc"
					               data-page-list="[20, 50, 100]"
					               data-page-size="20"
					               data-pagination="true" data-show-pagination-switch="true">
					            <thead>
					                <tr>
                                        <th data-field="periodo_numero" data-sortable="true" data-align="center" >Codigo</th>
					                    <th data-field="fecha"  data-width="10%" data-align="center" data-sortable="true" >Fecha </th>
					                    <th data-field="doc_sunat" data-sortable="true" data-align="center">Documento</th>
					                    <th data-field="nombre_comercial" data-sortable="true">Prospecto</th>
					                    <th data-field="monto_total"  data-width="10%" data-align="right" data-sortable="true">S/ Total</th>
                                        <th data-field="monto_pagado"  data-width="10%" data-align="right" data-sortable="true">S/ Por Cobrar</th>
					                    <th data-field="estado" data-align="center" data-sortable="true" data-formatter="estadoFormatter">Estado</th>
                                        <th data-field="id_venta" data-width="15%" data-align="center" data-sortable="false" data-formatter="actionFormatter" >Acciones</th>
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


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="js/nifty.min.js"></script>




    <!--=================================================-->
    
    <!--Demo script [ DEMONSTRATION ]-->


    
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

        function actionFormatter(value, row) {
            if (value) {
                return '<a href="ver_detalle_venta.php?id_venta=' + value + '" class="btn btn-icon btn-info" title="Ver Detalle Cotizacion"><i class="fa fa-eye"></i></a> ' +
                    ' <button type="button" class="btn btn-icon btn-danger" title="Anular Documento"><i class="fa fa-close"></i></button>  ' +
                    '  <button type="button" class="btn btn-icon btn-warning" title="Eliminar Documento"><i class="fa fa-trash"></i></button> ';
            }
        }
    </script>
    

</body>

<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:45 GMT -->
</html>

