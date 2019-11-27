<nav id="mainnav-container">
    <div id="mainnav">


        <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
        <!--It will only appear on small screen devices.-->
        <!--================================
        <div class="mainnav-brand">
            <a href="index.html" class="brand">
                <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                <span class="brand-text">Nifty</span>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        -->


        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img class="img-circle img-md" src="img/profile-photos/1.png" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <p class="mnp-name">Luis Oyanguren Giron</p>
                                <span class="mnp-desc">loyanguren@lunasystemsperu.com</span>
                            </a>
                        </div>
                    </div>


                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut" class="hidden">
                        <ul class="list-unstyled shortcut-wrap">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                        <i class="demo-pli-male"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                        <i class="demo-pli-speech-bubble-3"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                        <i class="demo-pli-thunder"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                        <i class="demo-pli-lock-2"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Menu Izquierda</li>

                        <!--Menu list item-->

                        <li class="active-sub">
                            <a href="index.php">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-bar-chart"></i>
                                <span class="menu-title">Ventas</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="ver_prospectos.php">Prospectos</a></li>
                                <li><a href="ver_productos.php">Productos</a></li>
                                <li><a href="ver_cotizaciones.php">Cotizaciones</a></li>
                                <li><a href="ver_facturacion.php">Facturacion</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="demo-pli-building"></i>
                                <span class="menu-title">Compras</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="layouts-collapsed-navigation.html">Proveedores</a></li>
                                <li><a href="layouts-offcanvas-navigation.html">Documentos Compras</a></li>
                                <li><a href="layouts-offcanvas-slide-in-navigation.html">Gastos sin Documento</a></li>
                                <li><a href="layouts-offcanvas-revealing-navigation.html">Clasificacion Compra</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="demo-pli-consulting"></i>
                                <span class="menu-title">Desarrollo</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="ver_ordenes_interna.php">Orden Interna</a></li>
                                <li><a href="ver_alquileres.php">Alquiler</a></li>
                                <li><a href="layouts-offcanvas-slide-in-navigation.html">Ticket Modificacion</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="demo-pli-receipt-4"></i>
                                <span class="menu-title">Cajas y Bancos</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="layouts-collapsed-navigation.html">Prestamos</a></li>
                                <li><a href="layouts-offcanvas-navigation.html">Caja Banco</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="demo-pli-split-vertical-2"></i>
                                <span class="menu-title">Administracion</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="ver_usuarios.php">Usuarios</a></li>
                                <li><a href="ver_documentos_sunat.php">Documentos SUNAT</a></li>
                                <li><a href="ver_mis_documentos.php">Mis Documentos SUNAT</a></li>
                            </ul>
                        </li>

                        <li class="list-divider"></li>

                        <!--Category name-->
                        <li class="list-header">IMC PERU SAC</li>

                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="demo-pli-boot-2"></i>
                                <span class="menu-title">Documentacion</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a href="ui-buttons.html">Empresas</a></li>
                                <li><a href="ui-panels.html">Auditorias Externas</a></li>
                                <li><a href="ui-modals.html">Documentacion</a></li>
                                <li><a href="ui-progress-bars.html">Inspecciones</a></li>
                                <li><a href="ui-components.html">Capacitaciones</a></li>

                            </ul>
                        </li>





                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>