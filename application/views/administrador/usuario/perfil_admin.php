<?php 
          foreach ($usuario as $value) {
            $admin_nombre=$value['admin_nombre'];
            $admin_password=$value['admin_password'];
            $admin_tipo=$value['admin_tipo'];
          
          }
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
            <li><i class="fa fa-home"></i>&nbsp;<a href="">Perfil</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Editar Perfil</li>
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
                                            <?= form_open('administradores/editar_admin',$form) ?>

                                            <h3>Editar</h3>
                                            <div class="form-group"><?= (form_label('Nombre','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="text" name="nombre"  class="form-control" value="<?php echo $admin_nombre ?>" placeholder="Nombre" autofocus></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('Password','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                         <input type="password" name="password"  class="form-control" value="<?php echo $admin_password ?>" placeholder="" autofocus></div>
                                                         <?=$admin_password ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><?= (form_label('tipo','',$label));  ?>
                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <?php if ($admin_tipo=1) {
                                                            # code...
                                                        } ?>
                                                         <input type="text" name="tipos"  class="form-control" value="<?php echo $admin_tipo ?>" placeholder="A. materno" autofocus>
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


          


         
