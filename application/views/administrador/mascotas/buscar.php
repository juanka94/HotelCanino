<?php 
	$submit = array('name' => '','class'=>'btn btn-green' ); 
	$form = array('class'=>'form-horizontal');
	$buscar = array('name' => 'nombre', 'id' => 'inputbuscar', 'class' => 'form-control');
	$select = array('class'=> 'form-control');
	$options = array(FALSE => 'Cualquiera', '1' => 'Servicio', '2' => 'Producto', '3' =>'Paquete');
	$options2 = array('1' => 'Servicio', '2' => 'Producto', '3' =>'Paquete');
?>
<div id="page-wrapper">
	<!--BEGIN TITLE & BREADCRUMB PAGE-->
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Mascotas</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="">Mascotas</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">Lista de Mascotas</li>
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
									<h3>Lista</h3>
									<?= form_open('mascotas', '');?>
									<div class="form-group">
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa fa-search"></i>
												 <?= form_input($buscar)?>
											</div>
										</div>
									</div>
									<?= form_submit('', 'Buscar',$submit);?>
									<?= form_close();?>
									<div class="box text-shadow">
                                        <table class="demo-tbl"><!--<item>1</item>-->
                                            <?php 
                                            if($resultado){
	                                            foreach ($mascota as $key) { ?>                                            
	                                                <tr class="tbl-item"><!--<img/>-->
	                                                    <!--<data></data>-->
	                                                    <td class="td-block"><p class="date"><strong>Dueño: </strong><?=$key['nombre_dueño']?> <?=$key['paterno']?> <?=$key['materno']?></p>
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
	                                                        <ul class="list-inline pull-right">
	                                                                <li><a type="submit" class="btn btn-blue btn-sm" href="<?= site_url(); ?>/administradores/ver_usuario/<?=$key['us_id']?>">Ver cliente</a></li> 
	                                                            </ul>
	                                                    </td>
	                                                </tr>
	                                        <?php }  
                                        	}
                                            else{   
												?></br><h3>No se encontro lo que buscaba<h3><?php
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