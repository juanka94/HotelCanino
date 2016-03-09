<?php 
$form = array('class' =>'form-horizontal');
$label= array('name'=>'','class'=>'col-sm-2 control-label');
$submit = array('name' => '','class'=>'btn btn-info btn-block' );
?>
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
                <div class="col-lg-12">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="row mtl">   
                                <div class="col-md-12">
                                    <div id="generalTabContent" class="tab-content">
                                        <div id="tab-edit" class="tab-pane fade in active">
                                            <?= (form_open('caja/insertar_caja',$form)); ?>
                                            <h3>Entrada o Salidas de Efectivo</h3>
                                            <div class="form-group"><?= (form_label('Nombre o Motivo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="nom_entrada"  class="form-control" value="" placeholder="" ></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Monto de Efectivo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="efectivo_entrada"  class="form-control" value="" placeholder="" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('Tipo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><select name="tipo_entrada" id="input" class="form-control">
                                                            <option value="1">-- Entrada de Efectivo --</option>
                                                            <option value="2">-- Salida de Efectivo --</option>
                                                        </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_submit('', 'Agregar a Caja',$submit);?>
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