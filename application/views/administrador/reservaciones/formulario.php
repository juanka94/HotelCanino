<?php 
$form = array('class' =>'form-horizontal');
$input_fecha_in = array('name' =>'','class' =>'form-control','value'=>$reservacion["fecha_in"], 'disabled'=>'1'); 
$input_fecha_out = array('name' =>'','class' =>'form-control','value'=>$reservacion["fecha_out"], 'disabled'=>'1' ); 
$opciones_temporada = array('0' => 'Baja','1'=>'Alta');
$temporada = ('id="" class="form-control"');
$dropdown = ('id="" class="form-control" disabled');
$nombre_dueño =array('name'=>'','class' =>'form-control','value'=>$usuario["nombre"],'disabled'=>'1');
$apellido_paterno = array('name' =>'','class' =>'form-control','value'=>$usuario["paterno"],'disabled'=>'1');
$apellido_materno = array('name' =>'','class' =>'form-control','value'=>$usuario["materno"],'disabled'=>'1');
$correo = array('name' =>'','class' =>'form-control','value'=>$usuario["correo"],'disabled'=>'1');
$Celular = array('name' =>'','class' =>'form-control','value'=>$usuario["cel"],'disabled'=>'1');
$Casa = array('name' =>'','class' =>'form-control','value'=>$usuario["casa"],'disabled'=>'1');
$direccion = array('name' =>'','class' =>'form-control','value'=>$usuario["calle"],'disabled'=>'1');
$localidad = array('name' =>'','class' =>'form-control','value'=>$usuario["localidad"],'disabled'=>'1');
$municipio = array('name' =>'','class' =>'form-control','value'=>$usuario["municipio"],'disabled'=>'1');
$estado = array('name' =>'','class' =>'form-control','value'=>$usuario["estado"],'disabled'=>'1');
$label= array('name'=>'','class'=>'col-sm-3 control-label');
$submit = array('name' => '','class'=>'btn btn-green btn-block' );
?>
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                Reservaciones</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Reservaciones</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Reservacion</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Formulario</li>
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
                        <div class="col-md-12"><h2>Formulario de Reservacion</h2>
                            <div class="row mtl">   
                                <div class="col-md-9">
                                    <div id="generalTabContent" class="tab-content">
                                        <div id="tab-edit" class="tab-pane fade in active">
                                            <?=  (form_open('reservaciones/validar_res',$form)); ?>
                                               <h3>Reservacion</h3>
                                                <?php if ($sencillo == TRUE) {?>
                                                    <div class="alert alert-info">
                                                        <strong>Info!</strong> El cliente requiere servicio a domicilio.
                                                    </div>
                                                <?php } elseif ($redondo == TRUE) { ?>
                                                    <div class="alert alert-info">
                                                        <strong>Info!</strong> El cliente requiere servicio a domicilio redondo.
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group"><?= (form_label('Fecha de entrada','',$label));  ?>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($input_fecha_in)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Fecha de salida','',$label));  ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($input_fecha_out)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Temporada','',$label)); ?>
                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-4"><?= (form_dropdown('temporada', $opciones_temporada, '', $temporada)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <h3>Datos del dueño</h3>
                                                <div class="form-group"><?= (form_label('Nombre','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($nombre_dueño)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Apellido paterno','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($apellido_paterno)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group"><?= (form_label('Apellido materno','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($apellido_materno)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group"><?= (form_label('Correo Electronico','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($correo)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Tel. Celular','',$label)); ?>

                                                    <div class="col-sm-5 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($Celular)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Tel. Casa','',$label)); ?>

                                                    <div class="col-sm-5 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($Casa)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group"><?= (form_label('Direccion','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($direccion)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Localidad','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($localidad)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group"><?= (form_label('Municipio','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($municipio)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><?= (form_label('Estado','',$label)); ?>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-9"><?= (form_input($estado)); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?= form_hidden('num_habitacion', $num_habitacion);?>
                                                <?= form_hidden('res_id', $num_res);?>
                                                <hr/>
                                                <?= form_submit('', 'Validar la reservacion',$submit);?>
                                        <?= form_close(); ?>
                                        </div>
                                    </div>
                                </div>                                      
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="panel">
                                <div class="panel-body">
                                    <div id="grid-layout-table-1" class="box jplist">
                                        <h3>Mascotas</h3>
                                        <div class="box text-shadow">
                                            <table class="demo-tbl"><!--<item>1</item>-->
                                                <?php 
                                                $num = 0;
                                                foreach ($mascota as $key) {?>                                            
                                                <tr class="tbl-item"><!--<img/>-->
                                                    <!--<data></data>-->
                                                    <td class="td-block"><p class="date"></p>
                                                        <p class="title"><strong>Nombre:</strong> <?=$key['nombre']?></p>
                                                        <?php  switch ($key['size']) {
                                                            case '1':
                                                                ?><p class="desc"><strong>Tamaño:</strong> Pequeño</p><?php
                                                                break;

                                                            case '2':
                                                                ?><p class="desc"><strong>Tamaño:</strong> Mediano</p><?php
                                                                break;

                                                            case '3':
                                                                ?><p class="desc"><strong>Tamaño:</strong> Grande</p><?php
                                                                break;

                                                            case '4':
                                                                ?><p class="desc"><strong>Tamaño:</strong> Extra grande</p><?php
                                                                break;

                                                            default:
                                                                ?><p class="desc"><strong>Error</strong></p><?php
                                                                break;
                                                        }?>
                                                        <p class="desc"><strong>Raza:</strong> <?=$key['raza']?></p>
                                                        <?php if ($key['genero'] == 1) {
                                                            ?><p class="desc"><strong>Genero:</strong> Macho</p><?php
                                                        } else{
                                                            ?><p class="desc"><strong>Genero:</strong> Hembra</p><?php
                                                            }?>
                                                        <p class="desc"><strong>Color:</strong> <?=$key['color']?></p>
                                                        <p class="desc"><strong>Edad:</strong> <?=$key['edad']?></p>
                                                        <p class="desc"><strong>Hora de comida:</strong> <?=$key['hora_comida']?></p>
                                                        <?php if ($key['esterilizado'] == 1) {
                                                            ?><p class="desc"><strong>Esta esterilizado</strong></p><?php
                                                        } else{
                                                            ?><p class="desc"><strong>No esta esterilizado</strong></p><?php
                                                            }?>
                                                        <?php if ($key['observaciones'] != NULL) {
                                                            ?><p class="desc"><strong>Observaciones</strong> <?=$key['observaciones']?></p><?php
                                                        } ?>
                                                        <?php if ($key['agresivo'] == 1) {
                                                            ?><p class="desc"><div class="col-lg-5 alert alert-danger"><strong>¡Cuidado! </strong>Es agresivo</div></p><?php
                                                        }?>
                                                        <?php if ($key['medicamento'] == 1) {
                                                            ?><p class="desc"><div class="col-lg-5 alert alert-info"><strong>¡Info! </strong>Toma medicamentos</div></p></p><?php
                                                        } ?>
                                                        <p class="like col-md-3"></p>
                                                    </td>
                                                </tr>
                                                <?php 
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
</div>