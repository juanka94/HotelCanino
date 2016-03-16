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
				Inventario</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="">Inventario</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">Lista de inventario</li>
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
									<?= form_open('administradores/inventario', '');?>

									<div class="form-group">
										<div class="col-md-4">
											<div class="input-icon right">
												<i class="fa fa-search"></i>
												 <?= form_input($buscar)?>
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<?= form_dropdown('tabla', $options, '', $select);?>
										</div>
									</div>
									<?= form_submit('', 'Buscar',$submit);?>
									<?= form_close();?>
									</br>
									<?= form_open('administradores/form_agregar', '');?>
									<div class="col-md-2">
										<div class="form-group">
											<?= form_dropdown('tabla2', $options2, '', $select);?>
										</div>
									</div>
									<?= form_submit('', 'Agregar',$submit);?>
									<?= form_close();?>
									<div class="box text-shadow">
										<table class="demo-tbl"><!--<item>1</item>-->
											<?php 
											if($productos) {
												foreach ($productos as $key) {?>                                            
											<tr class="tbl-item"><!--<img/>-->
												<!--<data></data>-->
												<td class="td-block"><p class="date">$<?=$key->prod_precio?></p>
													<p class="title">Producto: <?=$key->prod_nombre?></p>
													<p class="desc"><?=$key->prod_descripcion?></p>
													<p class="like col-md-3">Cantidad disponible: <?=$key->prod_cantidad?></p>
													<ul class="list-inline pull-right">
														<li><a class="btn btn-green btn-xs" href="<?=site_url()?>/inventario/cantidad_producto/<?=$key->prod_id?>/<?=$key->prod_cantidad?>">Agregar</a></li>
														<li><a class="btn btn-yellow btn-xs" href="<?=site_url()?>/inventario/form_producto/<?=$key->prod_id?>">Modificar</a></li>
														<li><a class="btn btn-red btn-xs" href="<?=site_url()?>/inventario/eliminar_producto/<?=$key->prod_id?>">Eliminar</a></li>
													</ul>
												</td>
											</tr>
											<?php 
											} 
												}

											if($servicios) {
												foreach ($servicios as $key) {?>                                            
											<tr class="tbl-item"><!--<img/>-->
												<!--<data></data>-->
												<td class="td-block"><p class="date">$<?=$key->serv_precio?></p>
													<p class="title">Servicio: <?=$key->serv_nombre?></p>
													<p class="desc"><?=$key->serv_descripcion?></p>
													<ul class="list-inline pull-right">
														<li><a class="btn btn-yellow btn-xs" href="<?=site_url()?>/administradores/form_servicio/<?=$key->serv_id?>">Modificar</a></li>
														<li><a class="btn btn-red btn-xs" href="<?=site_url()?>/administradores/eliminar_servicio/<?=$key->serv_id?>">Eliminar</a></li>
													</ul>
												</td>
											</tr>
											<?php 
											} 
												}

											if($paquetes) {
												foreach ($paquetes as $key) {?>                                            
											<tr class="tbl-item"><!--<img/>-->
												<!--<data></data>-->
												<td class="td-block"><p class="date">$<?=$key->paque_precio?></p>
													<p class="title">Paquete: <?=$key->paque_nombre?></p>
													<p class="desc"><?=$key->paque_descripcion?></p>
													<ul class="list-inline pull-right">
														<li><a class="btn btn-yellow btn-xs" href="<?=site_url()?>/administradores/form_paquete/<?=$key->paque_id?>">Modificar</a></li>
														<li><a class="btn btn-red btn-xs" href="<?=site_url()?>/administradores/eliminar_paquete/<?=$key->paque_id?>">Eliminar</a></li>
													</ul>
												</td>
											</tr>
											<?php 
											} 
												}

											if(!$resultado) {   
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
	</div>