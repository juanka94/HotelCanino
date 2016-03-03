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
            <li class="active">Ver Cliente</li>
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
                                            <?= form_open('',$form) ?>

                                            <h3>Ver Cliente</h3>
                                            <div class="form-group"><?= (form_label('Nombre','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="nom_usuario"  class="form-control" value="<?=$usuario['nombre']?>" disabled></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('A. Paterno','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="ap_paterno"  class="form-control" value="<?=$usuario['paterno']?>" disabled></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('A. Materno','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="ap_materno"  class="form-control" value="<?=$usuario['materno']?>" disabled></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Casa','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="tel_casa"  class="form-control" value="<?=$usuario['casa']?>" disabled></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Celular','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="tel_celular"  class="form-control" value="<?=$usuario['cel']?>" disabled>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Correo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                              <input type="text" name="email"  class="form-control" value="<?=$usuario['correo']?>" disabled>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Contraseña','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="password" name="password"  class="form-control" value="<?=$usuario['password']?>" disabled>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('calle','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                             <input type="text" name="dom_calle"  class="form-control" value="<?=$usuario['calle']?>" disabled>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('localidad','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="localidad"  class="form-control" value="<?=$usuario['localidad']?>" disabled>    
                      
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group"><?= (form_label('municipio','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="municipio"  class="form-control" value="<?=$usuario['municipio']?>" disabled>    
                      
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('estado','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <input type="text" name="estado"  class="form-control" value="<?=$usuario['estado']?>" disabled>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Tipo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <?php if ($usuario['tipo']) {?>
                                                        <div class="col-xs-6">
                                                            <input type="text" name="estado"  class="form-control" value="Frecuente" disabled>
                                                        </div>
                                                        <?php } 
                                                        else{?>
                                                        <div class="col-xs-4">
                                                            <input type="text" name="estado"  class="form-control" value="Nuevo" disabled>
                                                            <a type="submit" class="btn btn-green" href="<?= site_url(); ?>/administradores/upgrade/<?=$usuario['id']?>">Cambiar</a>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?= form_close(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="panel">
                                <div class="panel-body">
                                    <div id="grid-layout-table-1" class="box jplist">
                                        <h3>Mascotas</h3>
                                        <div class="box text-shadow">
                                            <table class="demo-tbl"><!--<item>1</item>-->
                                                <?php 
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
                                                            <ul class="list-inline pull-right">
                                                                <li></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php } ?>                           
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