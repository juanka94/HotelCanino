 <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Reservaciones Pendientes</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="">Reservaciones</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Reservaciones</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Reservaciones Pendientes</li>
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
                                            <div class="panel-heading">Reservaciones</div>
                                            <div class="panel-body">
                                                <table class="table table-hover-color">
                                                    <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Fecha de entrada</th>
                                                        <th>Fecha de salida</th>
                                                        <th>Accion</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if ($reservacion) {
                                                    foreach ($reservacion as $value => $key) { ?>
                                                    <tr>
                                                        <td><?= $key->us_nombre ?></td>
                                                        <td><?= $key->res_fecha_in ?></td>
                                                        <td><?= $key->res_fecha_out ?></td>
                                                        <td><a type="submit" class="btn btn-blue btn-xs" href="<?= site_url(); ?>/reservaciones/lugar/<?= $key->res_id?>">Agregar</a>
                                                        </td>
                                                    </tr>
                                                    <?php  } }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
                <!--END CONTENT-->