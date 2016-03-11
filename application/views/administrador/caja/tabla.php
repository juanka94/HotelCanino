<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                </div>
        </div>
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
                 <div class="panel panel-blue" style="background:#FFF;">
                            <div class="panel-heading">Sistema de Entradas y Salidas de Efectivo</div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                <h3 align="right">Fecha <?=$fecha ?></h3>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Monto</th>
                                        <th>Tipo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- 1 entrada 2 salida -->
                                    <?php 
                                    if ($caja) {
                                        $num=1;
                                        foreach ($caja as $value => $key) { ?>
                                    <tr>
                                        <td><?= $num?></td>
                                        <td><?= $key->caja_datos_nombre ?></td>
                                        <td><?= $key->caja_datos_monto ?> Pesos ($)</td>
                                        <td> <?php if($key->caja_datos_tipo==1){?>
                                        <span class="label label-sm label-info">Entrada</span>
                                        <?php }else{  ?>
                                        <span class="label label-sm label-danger">Salida</span>
                                        <?php } ?>
                                        </td>  
                                    </tr>
                                    <?php $num++; } }?>
                                    </tbody>
                                    <tfoot>
                                   
                                    <tr>
                                    <th></th>
                                        <th></th>
                                        <th><h2>TOTAL EN CAJA</h2></th>
                                        <th><h2><?=$total ?> $</h2></th> 
                                    </tr>
                                    </tfoot>

                                </table>
                                <a type="submit" class="btn btn-primary" href="<?=site_url('caja/entradas_salidas'); ?>">Agregar Entrada o Salida de Efectivo</a>
                                <a type="submit" class="btn btn-warning" href="<?=site_url('administradores/'); ?>">Cerrar Caja</a>
                            </div>
                        </div>
            </div>


        </div>
    </div>
</div>