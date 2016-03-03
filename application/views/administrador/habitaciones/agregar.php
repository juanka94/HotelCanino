<?php 
    $submit = array('name' => '','class'=>'btn btn-green' ); 
    $form = array('class'=>'form-horizontal');
    $buscar = array('name' => 'nombre', 'id' => 'inputbuscar', 'class' => 'form-control');
    $hidden = array('res_id' => $res_id);
    $select = array('class'=> 'form-control');
    $options = array(FALSE => 'Cualquiera', '1' => 'Servicio', '2' => 'Producto', '3' =>'Paquete');
?>
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                Agregar</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="">Agregar</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Producto,Servicio o Paquete</li>
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
                <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div id="grid-layout-table-1" class="box jplist">
                                    <H3>Lista</H3>
                                    <?= form_open('administradores/mostrar', '',$hidden);?>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa fa-search"></i>
                                                 <?= form_input($buscar)?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?= form_dropdown('tabla', $options, '', $select);?>
                                        </div>
                                    </div>
                                    <?= form_submit('', 'buscar',$submit);?>
                                    <?= form_close();?>
                                    <div class="box text-shadow">
                                        <table class="demo-tbl"><!--<item>1</item>-->
                                            <?php 
                                            if($productos) {
                                                foreach ($productos as $key) {?>                                            
                                            <tr class="tbl-item"><!--<img/>-->
                                                <!--<data></data>-->
                                                <td class="td-block"><p class="date">$<?=$key->prod_precio?></p>
                                                    <p class="title"><?=$key->prod_nombre?></p>
                                                    <p class="desc"><?=$key->prod_descripcion?></p>
                                                    <p class="like col-md-3">Cantidad disponible: <?=$key->prod_cantidad?></p>
                                                    <a class="btn btn-green btn-xs pull-right" href="<?=site_url()?>/habitaciones/agregar_producto_reservacion/<?= $res_id?>/<?=$mas_id?>/<?= $key->prod_id?>/<?= $num_habitacion?>"><span class="fa fa-plus fa-fw"></span></a>
                                                </td>
                                            </tr>
                                            <?php 
                                            } 
                                                }

                                            if($servicios) {
                                                foreach ($servicios as $key) {?>                                            
                                            <tr class="tbl-item"><!--<img/>-->
                                                <!--<data></data>-->
                                                <td class="td-block"><p class="date">$<?=$key->serv_precio?></p>
                                                    <p class="title"><?=$key->serv_nombre?></p>
                                                    <p class="desc"><?=$key->serv_descripcion?></p>
                                                    <a class="btn btn-green btn-xs pull-right" href="<?=site_url()?>/habitaciones/agregar_servicio_reservacion/<?= $res_id?>/<?=$mas_id?>/<?= $key->serv_id?>/<?= $num_habitacion?>"><span class="fa fa-plus fa-fw"></span></a>
                                                </td>
                                            </tr>
                                            <?php 
                                            } 
                                                }

                                            if($paquetes) {
                                                foreach ($paquetes as $key) {?>                                            
                                            <tr class="tbl-item"><!--<img/>-->
                                                <!--<data></data>-->
                                                <td class="td-block"><p class="date">$<?=$key->paque_precio?></p>
                                                    <p class="title"><?=$key->paque_nombre?></p>
                                                    <p class="desc"><?=$key->paque_descripcion?></p>
                                                    <a class="btn btn-green btn-xs pull-right" href="<?=site_url()?>/habitaciones/agregar_paquete_reservacion/<?= $res_id?>/<?=$mas_id?>/<?= $key->paque_id?>/<?= $num_habitacion?>"><span class="fa fa-plus fa-fw"></span></a>
                                                </td>
                                            </tr>
                                            <?php 
                                            } 
                                                }

                                            if(!$resultado) {   
                                                ?></br><H3>No se encontro lo que buscaba</H3><?php
                                            }?>                           
                                        </table>
                                    </div>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>