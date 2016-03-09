<?php 
    $form = array('class' =>'form-horizontal');
    $label= array('name'=>'','class'=>'col-sm-3 control-label');
    $submit = array('name' => '','class'=>'btn btn-green btn-block' );
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
            <li class="active">Agregar Cliente</li>
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
                                            <?= form_open('reservaciones/add_cliente',$form) ?>

                                            <h3>Agregar Cliente</h3>
                                            <div class="form-group"><?= (form_label('Nombre','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="nom_usuario"  class="form-control" value="" placeholder="Nombre" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('A. Paterno','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="ap_paterno"  class="form-control" value="" placeholder="A. Paterno" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('A. Materno','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="ap_materno"  class="form-control" value="" placeholder="A. materno" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Casa','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="tel_casa"  class="form-control" value="" placeholder="Tel. Casa" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Celular','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="tel_celular"  class="form-control" value="" placeholder="Tel. Celula" autofocus>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Correo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                              <input type="text" name="email"  class="form-control" value="" placeholder="Correo" autofocus>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Password','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="password" name="password"  class="form-control" value="" placeholder="Contraseña" autofocus>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('calle','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="dom_calle"  class="form-control" value="" placeholder="Domicilio Calle" autofocus>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('localidad','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="localidad"  class="form-control" value="" placeholder="Localidad" autofocus>    
                      
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('municipio','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="municipio"  class="form-control" value="" placeholder="municipio" autofocus>    
                      
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('estado','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="estado"  class="form-control" value="" placeholder="Estado" autofocus>
               
                      
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


          


         
