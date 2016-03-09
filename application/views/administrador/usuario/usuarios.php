<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                Lista de Usuarios Cliente</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="">Clientes</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Reservaciones</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Lista de Clientes</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div id="tab-general">
            <div class="row mbl">
                <div class="col-lg-12">
                    
                                <div class="col-md-12">
                                    <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                    </div>
                                </div>  
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-blue">
                                <div class="panel-heading">Clientes</div>
                                <div class="panel-body">
                                    <table class="table table-hover-color">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido paterno</th>
                                            <th>Accion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $num=1;
                                            foreach ($usuarios as $value => $key) { ?>
                                        <tr>
                                            <td><?= $num?></td>
                                            <td><?= $key->us_nombre ?></td>
                                            <td><?= $key->us_ap_paterno ?></td>
                                            <td>
                                                <a type="submit" class="btn btn-green btn-xs" href="<?= site_url(); ?>/administradores/ver_usuario/<?= $key->us_id?>">ver</a>
                                                <a type="submit" class="btn btn-warning btn-xs" href="<?= site_url(); ?>/administradores/enviar_correo_vista/<?= $key->us_id?>">Eviar Info</a>
                                                <a type="submit" class="btn btn-blue btn-xs" href="<?= site_url(); ?>/administradores/modificar_usuario/<?= $key->us_id?>">Modificar</a>
                                                <a type="submit" class="btn btn-red btn-xs" href="<?= site_url(); ?>/administradores/eliminar_usuario/<?= $key->us_id?>">Eliminar</a>
                                            </td>
                                        </tr>
                                        <?php $num++; } ?>
                                        </tbody>
                                    </table>
                                  <a type="submit" class="btn btn-blue btn-xs" href="<?= site_url(); ?>/administradores/crear_cliente">Agregar Cliente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    <!--END CONTENT-->