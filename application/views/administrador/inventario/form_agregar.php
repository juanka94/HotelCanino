<?php 
$form = array('class' =>'form-horizontal');
$nombre = array('name' =>'nombre','class' =>'form-control'); 
$cantidad = array('name' =>'cantidad','class' =>'form-control'); 
$precio = array('name' =>'precio','class' =>'form-control'); 
$descripcion = array('name' =>'descripcion','class' =>'form-control'); 
$label= array('name'=>'','class'=>'col-sm-3 control-label');
$submit = array('name' => '','class'=>'btn btn-green btn-block' );
?>
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
            Inventario</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="">Inventario</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Agregar</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active"></li>
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
                        <div class="col-md-12"><h2>Agregar</h2>
                            <div class="row mtl">   
                                <div class="col-md-9">
                                    <div id="generalTabContent" class="tab-content">
                                        <div id="tab-edit" class="tab-pane fade in active">
                                            <?php if ($tabla==1) { ?>
                                            <?= (form_open('administradores/add_servicio',$form)); ?>
                                            <h3>servicio</h3>
                                            <div class="form-group"><?= (form_label('Nombre del servicio','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($nombre)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Precio del servicio','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($precio)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Descripción del servicio','',$label)); ?>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($descripcion)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_submit('', 'Agregar',$submit);?>
                                            <?= form_close(); ?>
                                            <?php } 
                                            elseif ($tabla==2) {?>
                                            <?= (form_open('administradores/add_producto',$form)); ?>
                                            <h3>Producto</h3>
                                            <div class="form-group"><?= (form_label('Nombre del producto','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($nombre)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Precio del producto','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($precio)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Cantidad de productos','',$label)); ?>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($cantidad)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Descripción del producto','',$label)); ?>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($descripcion)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                             <?= form_submit('', 'Agregar',$submit);?>
                                            <?= form_close(); ?>
                                            <?php } 
                                            elseif ($tabla==3) {?>
                                            <?= (form_open('administradores/add_paquete',$form)); ?>
                                            <h3>paquete</h3>
                                            <div class="form-group"><?= (form_label('Nombre del paquete','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($nombre)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Precio del paquete','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($precio)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Descripción del paquete','',$label)); ?>

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><?= (form_input($descripcion)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_submit('', 'Agregar',$submit);?>
                                            <?= form_close(); ?>
                                            <?php } ?> 
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
</div>