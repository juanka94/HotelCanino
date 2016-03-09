<?php 
    $form = array('class' =>'form-horizontal');
    $label= array('name'=>'','class'=>'col-sm-3 control-label');
    $submit = array('name' => '','class'=>'btn btn-green btn-block' );
    $hidden = array('us_id' => $us_id->us_id);
?>
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="">Clientes</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Clientes</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Agregar Mascota</li>
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
                        <div class="col-md-12">
                            <div class="row mtl">   
                                <div class="col-md-9">
                                    <div id="generalTabContent" class="tab-content">
                                        <div id="tab-edit" class="tab-pane fade in active">
                                            <?= form_open('reservaciones/agregar_mascota',$form,$hidden) ?>
                                            <h3>Agregar mascota</h3>
                                             <div class="form-group"><?= (form_label('Fecha de entrada','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" name="fech_in" class="form-control" id="datetimepicker_fecha_in"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('Fecha de salida','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" name="fech_out" class="form-control" id="datetimepicker_fecha_out"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Nombre de la mascota','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="nombre"  class="form-control" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Tamaño','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <select name="tamaño" class="form-control">
                                                                <option value="1">Pequeño</option>
                                                                <option value="2">Medianp</option>
                                                                <option value="3">Grande</option>
                                                                <option value="4">Extra grande</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Raza','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" name="raza"  class="form-control" autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Sexo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <select name="sexo" class="form-control">
                                                            <option value="0">Hembra</option>
                                                            <option value="1">Macho</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Color','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="color"  class="form-control" autofocus>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Edad','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" name="edad"  class="form-control" autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Hora de la comida','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="comida"  class="form-control" autofocus>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Esterilizado','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <SELECT name="esterlilizado" class="form-control">
                                                                <option value="1">Si</option>
                                                                <option value="0">No</option>   
                                                            </SELECT>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Agresivo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <select name="agresivo" class="form-control">
                                                                <option value="1">Si</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('Medicamento','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <select name="medicamento" class="form-control">
                                                                <option value="1">Si</option>
                                                                <option value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('observaciones','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <textarea name="observaciones" class="form-control"> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_submit('', 'Agregar',$submit);?>
                                            <?= form_close(); ?>
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