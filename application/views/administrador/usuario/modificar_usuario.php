<?php 
    $form = array('class' =>'form-horizontal');
    $label= array('name'=>'','class'=>'col-sm-3 control-label');
    $opciones_tipo = array(0 => 'Nuevo',1 =>'Frecuente');
    $dropdown = ('id="" class="form-control"');
    $submit = array('name' => '','class'=>'btn btn-green btn-block' );
    $hidden = array('us_id' => $usuario['id']);
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
            <li class="active">Modificar Cliente</li>
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
                                            <?= form_open('administradores/update_usuario',$form,$hidden) ?>
                                            <h3>Modificar Cliente</h3>
                                            <div class="form-group"><?= (form_label('Nombre','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="nom_usuario"  class="form-control" value="<?=$usuario['nombre']?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('A. Paterno','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="ap_paterno"  class="form-control" value="<?=$usuario['paterno']?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('A. Materno','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="ap_materno"  class="form-control" value="<?=$usuario['materno']?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Casa','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="tel_casa"  class="form-control" value="<?=$usuario['casa']?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Celular','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="tel_celular"  class="form-control" value="<?=$usuario['cel']?>">
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Correo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                              <input type="text" name="email"  class="form-control" value="<?=$usuario['correo']?>">
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Contraseña','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="password" name="password"  class="form-control" value="<?=$usuario['password']?>">
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('calle','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="dom_calle"  class="form-control" value="<?=$usuario['calle']?>">
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('localidad','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="localidad"  class="form-control" value="<?=$usuario['localidad']?>">    
                      
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('municipio','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="municipio"  class="form-control" value="<?=$usuario['municipio']?>">    
                      
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('estado','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="estado"  class="form-control" value="<?=$usuario['estado']?>">
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Tipo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <?= (form_dropdown('tipo', $opciones_tipo,$usuario['tipo'],$dropdown)); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_submit('', 'Modificar',$submit);?>
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