<?php
require '../models/cl_pago_frecuente.php';
require '../models/cl_pago_frecuente_pago.php';
require '../models/cl_proveedor.php';
require '../models/cl_clasificacion_movimientos.php';
require '../models/cl_banco.php';
require '../tools/cl_varios.php';

$c_pago = new cl_pago_frecuente();
$c_proveedor = new cl_proveedor();
$c_clasificacion = new cl_clasificacion_movimientos();
$c_banco = new cl_banco();
$c_detalle_pago = new cl_pago_frecuente_pago();

$c_varios = new cl_varios();

if (filter_input(INPUT_GET, 'id_frecuente')) {
    $c_pago->setId(filter_input(INPUT_GET, 'id_frecuente'));
    $c_pago->obtener_datos();

    $c_proveedor->setId($c_pago->getIdProveedor());
    $c_proveedor->obtener_datos();

    $c_clasificacion->setId($c_pago->getIdClasificacion());
    $c_clasificacion->obtener_datos();

    $c_detalle_pago->setIdFrecuente($c_pago->getId());
    $filas_documentos = $c_detalle_pago->verFilasActual();

    $filas_todos = $c_detalle_pago->verFilasTodos();
} else {
    header("Location: ver_pagos_frecuentes.php");
}
?>
<!DOCTYPE html>
<html lang="es">


<!-- Mirrored from www.themeon.net/nifty/v2.9.1/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2019 21:40:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Ver Detalle de Pago Frecuente | Software de Gestion | Luna Systems Peru</title>


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
                    <h1 class="page-header text-overflow">Detalle del Pago Frecuente</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->


                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Pagos - Compras</a></li>
                    <li><a href="ver_pagos_frecuentes.php">Pagos Frecuentes</a></li>
                    <li class="active">Detalle del Pago Frecuente</li>
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
                            <h3 class="panel-title  text-bold">Detalle del Pago Frecuente </h3>
                        </div>

                        <div class="panel-heading">
                            <div class="col-lg-12">
                                <a href="reg_envio.php" class="btn btn-info"><i class="fa fa-edit"></i> Modificar Pago</a><!-- en otra ocasion solicitar conformidad envia un correo para q el cliente marque finalizacion dle servicio  -->
                                <a href="../controller/fin_pago_frecuente.php?input_codigo=<?php echo $c_pago->getId()?>" class="btn btn-success"><i class="fa fa-telegram"></i> Pasar a sgte mes</a>
                                <a href="../controller" class="btn btn-warning"><i class="fa fa-stop"></i> Detener Frecuencia</a>
                                <a href="reg_hoja_ruta.php" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="form-group">
                                <p> Codigo Pago: <?php echo $c_pago->getId()?></p>
                                <p> Proveedor: <?php echo $c_proveedor->getRazonSocial() . " | " . $c_proveedor->getDocumento()?></p>
                                <p> Servicio: <b><?php echo $c_pago->getServicio()?> </b></p>
                                <hr>
                                <p> Frecuencia: <?php echo $c_pago->getFrecuencia()?></p>
                                <p> Fecha Recordatorio: <?php echo $c_pago->getFechaRecordatorio()?></p>
                                <p> Dias Faltantes: <?php echo $c_varios->restar_fechas(date("Y-m-d"), $c_pago->getFechaRecordatorio())?></p>
                                <hr>
                                <p> Total Para Pagar: <?php echo $c_pago->getMonto()?></p>
                                <p> Total Pagado: <?php echo $c_pago->getPagado()?></p>
                                <p>Estado: <label class="label label-warning">Pendiente</label></p>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 eq-box-sm">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-bold">Ver Pagos de este Periodo</h3>
                        </div>
                        <div class="panel-body">
                            <?php if ($c_pago->getMonto() > $c_pago->getPagado()) {?>
                            <button type="button" class="btn btn-info" data-target="#demo-default-modal" data-toggle="modal"><i class="fa fa-plus"></i> Agregar</button>
                            <?php } ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Banco</th>
                                    <th>Monto</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($filas_documentos as $filas) {
                                    ?>
                                    <tr>
                                        <td><?php echo $filas['fecha'] ?></td>
                                        <td><?php echo $filas['nombre'] ?></td>
                                        <td><?php echo number_format($filas['sale'], 2) ?></td>
                                        <td><button class="btn btn-danger" ><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 eq-box-sm">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title text-bold">Ver Todos los Pagos</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Banco</th>
                                    <th>Monto</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($filas_todos as $filas) {
                                    ?>
                                    <tr>
                                        <td><?php echo $filas['fecha'] ?></td>
                                        <td><?php echo $filas['nombre'] ?></td>
                                        <td><?php echo number_format($filas['sale'], 2) ?></td>
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
                <h4 class="modal-title">Agregar Pago</h4>
            </div>
            <form method="post" action="../controller/reg_pagos_frecuente_pago.php">
                <!--Modal body-->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="select_banco" class="control-label text-semibold">Banco</label>
                        <select class="form-control" name="select_banco">
                            <?php
                            foreach ($c_banco->verFilas() as $fila) {
                                ?>
                                <option value="<?php echo $fila['id_banco']?>"><?php echo $fila['nombre'] . " Actual S/: " . $fila['monto']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="input_descripcion" class="control-label text-semibold">Descripcion</label>
                        <input type="text" id="input_descripcion" name="input_descripcion" class="form-control" value="<?php echo "PAGO DE " . $c_pago->getServicio() . " A " . $c_proveedor->getRazonSocial()?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="demo-oi-definput" class="control-label text-semibold">Fecha</label>
                        <input type="date" id="demo-oi-definput" name="input_fecha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="input_monto" class="control-label text-semibold">Monto Total</label>
                        <input type="text" id="input_monto" name="input_monto" class="form-control" value="<?php echo $c_pago->getMonto()?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_monto_pagar" class="control-label text-semibold">Monto a Pagar</label>
                        <input type="text" id="input_monto_pagar" name="input_monto_pagar" class="form-control" required>
                    </div>
                    <input type="hidden" value="<?php echo $c_pago->getIdClasificacion()?>" name="hidden_id_clasificacion">
                    <input type="hidden" value="<?php echo $c_pago->getId()?>" name="hidden_id_frecuente">
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button class="btn btn-info"><i class="fa fa-plus"></i> Guardar Pago</button>
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

<!--Bootstrap Table Sample [ SAMPLE ]-->
<script src="../public/js/demo/tables-bs-table.js"></script>


<!--Bootstrap Table [ OPTIONAL ]-->
<script src="../public/plugins/bootstrap-table/bootstrap-table.min.js"></script>


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

