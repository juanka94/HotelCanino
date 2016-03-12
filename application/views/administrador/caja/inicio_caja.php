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
                                            <?= (form_open('caja/inicio_caja',$form)); ?>
                                            <h3>Inicio de Caja</h3>
                                            <div class="form-group"><?= (form_label('Monto de Inicial','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9"><input type="text" name="monto_inicial"  class="form-control" value="" placeholder="" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('Fecha del Dia','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" name="fech_in" class="form-control" id="datepicker_fecha"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_submit('', 'Iniciar Caja',$submit);?>
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