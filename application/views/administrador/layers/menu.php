   <?php 
        $datos = $this->session->userdata('logged_user');
?>
<!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="" class="navbar-brand"><span class="fa fa-rocket"></span><span class="" >Hotel Canino Reyes</span><span style="display: none" class="logo-text-icon"></span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<?= base_url()?>assets/admin/images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs">Hola! <?php echo($datos->admin_nombre);?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="<?= site_url()?>/administradores/perfil"><i class="fa fa-user"></i>Mi Perfil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=site_url() ?>/administradores/logout"><i class="fa fa-key"></i>Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
            
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                    <li><a href="<?= site_url()?>/administradores/index"><i class="fa fa-paw fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Reservaciones</span></a>
                    
                    </li>
                    
                    <li><a href="<?= site_url()?>/habitaciones"><i class="fa fa-home fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Habitaciones</span></a>
                      
                    </li>
                    <li><a href="<?= site_url()?>/administradores/usuarios"><i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Clientes</span></a>
                          
                    </li>
                    <li><a href="<?= site_url()?>/administradores/crear_admin"><i class="fa fa-user fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Usuarios Admin</span></a>
                          
                    </li>
                   
                    <li><a href="<?= site_url()?>/inventario"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Inventario</span></a>
                       
                    </li>
                     <li><a href="<?= site_url()?>/caja"><i class="fa fa-money fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Caja</span></a>
                       
                    </li>
                </ul>
            </div>
        </nav>