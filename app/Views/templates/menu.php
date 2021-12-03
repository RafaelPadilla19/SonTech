<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand text-decoration-none" href="home">
                    <span class="align-middle">SonTech</span>
                </a>
                <!--barra lateral-->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Paginas
                    </li>
                    <!--silebar item dropdown usuarios-->
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="<?php echo base_url();?>/home">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Inicio</span>
                        </a>
                    </li>


                    
                    <li class="sidebar-item ">
                        <a data-bs-target="#producto" data-bs-toggle="collapse" class="sidebar-link collapsed "
                            aria-expanded="false">
                            <i class="align-middle" data-feather="shopping-bag"></i>
                            <span class="">Productos</span>
                        </a>
                        <ul id="producto" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/Producto">Productos </a></li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/TipoProducto">Tipos de producto </a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url();?>/marca">
                            <i class="align-middle" data-feather="tag"></i> <span
                                class="align-middle">Marcas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url();?>/departamento">
                            <i class="align-middle" data-feather="credit-card"></i> <span
                                class="align-middle">Departamentos</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?php echo base_url();?>/cliente">
                            <i class="align-middle" data-feather="user-check"></i> <span
                                class="align-middle">Clientes</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#dashboardss" data-bs-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="">Usuarios</span>
                        </a>
                        <ul id="dashboardss" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/Usuario">Usuarios</a></li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/TipoUsuario">Tipos de usuario </a></li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#facturar" data-bs-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">
                            <i class="align-middle" data-feather="shopping-cart"></i>
                            <span class="">Facturacion</span>
                        </a>
                        <ul id="facturar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/FacturaVenta">Facturar</a></li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/TipoUsuario">Buscar factura</a></li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a data-bs-target="#ordenes" data-bs-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">
                            <i class="align-middle" data-feather="clipboard"></i>
                            <span class="">Solitudes de compra</span>
                        </a>
                        <ul id="ordenes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/Usuario">Crear Solicitud de compra</a></li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/TipoUsuario">Actas de compra</a></li>
                        </ul>
                    </li> -->

                    <li class="sidebar-item">
                        <a data-bs-target="#reportes" data-bs-toggle="collapse" class="sidebar-link collapsed"
                            aria-expanded="false">
                            <i class="align-middle" data-feather="book"></i>
                            <span class="">Reportes generales</span>
                        </a>
                        <ul id="reportes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/Usuario">Producto mas vendido</a></li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="<?php echo base_url();?>/TipoUsuario">Ventas semanal</a></li>
                        </ul>
                    </li>

                </ul>
                <!--barra lateral-->
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>


                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
                            <!--Notificaciones-->
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger" data-feather="alert-circle"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-warning" data-feather="bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                                    hendrerit et.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-primary" data-feather="home"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.8</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-success" data-feather="user-plus"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Christina accepted your request.
                                                </div>
                                                <div class="text-muted small mt-1">14h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                            <!--Notificaciones-->
                        </li>
                        <!--Mensajes-->
                        <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        4 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url(); ?>/public/img/avatars/avatar.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">Vanessa Tucker</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu
                                                    tortor.</div>
                                                <div class="text-muted small mt-1">15m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url(); ?>/public/img/avatars/avatar.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="William Harris">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">William Harris</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod
                                                    vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url(); ?>/public/img/avatars/avatar.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">Christina Mason</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
                                                </div>
                                                <div class="text-muted small mt-1">4h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="<?php echo base_url(); ?>/public/img/avatars/avatar.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                                    
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">Sharon Lessman</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
                                                    posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>
                        <!--Mensajes-->
                        <!--Perfil-->
                     
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>/public/img/avatars/avatar.jpg" class="avatar img-fluid rounded" alt="Charles Hall" />
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="<?php echo base_url(); ?>/public/img/avatars/avatar.jpg" class="avatar img-fluid rounded" alt="Charles Hall" />
                                <span class="text-dark"><?php echo $_SESSION['usuario']['apellido_usuario'] ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="user"></i>
                                    Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="align-middle mr-1"
                                        data-feather="settings"></i> Opciones y Seguridad</a>
                                <a class="dropdown-item" href="#"><i class="align-middle mr-1"
                                        data-feather="help-circle"></i> Ayuda</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>/Login/logout">Cerrar Sesion</a>
                            </div>
                        </li>
                        <!--Perfil-->
                    </ul>
                </div>
            </nav>