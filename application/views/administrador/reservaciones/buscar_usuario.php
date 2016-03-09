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
			<div class="page-title">Usuarios</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="">Usuarios</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">Lista de Usuarios</li>
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
											<?= form_open('reservaciones/buscar_usuario', '');?>
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
											</br>
											<div class="col-md-2">
												<div class="form-group">
													<a class="btn btn-blue btn" href="<?=site_url()?>/reservaciones/crear_cliente">Agregar nuevo cliente</a>
												</div>
											</div>
											<div class="box text-shadow">
												<table class="demo-tbl"><!--<item>1</item>-->
													<?php 
													if($usuarios) {
														foreach ($usuarios as $key) {?>                                            
													<tr class="tbl-item"><!--<img/>-->
														<!--<data></data>-->
														<td class="td-block"><p class="date"></p>
															<p class="title"><strong>Nombre</strong> <?=$key->us_nombre?> <?=$key->us_ap_paterno?> <?=$key->us_ap_materno?></p>
															<p class="desc"><strong>Telefono de casa</strong> <?=$key->us_tel_casa?></p>
															<p class="desc"><strong>Telefono celular</strong> <?=$key->us_tel_cel?></p>
															<p class="desc"><strong>Domicilio</strong> <?=$key->us_dom_calle?> <?=$key->us_dom_localidad?> <?=$key->us_dom_municipio?> <?=$key->us_dom_estado?></p>
															<ul class="list-inline pull-right">
																<li><a class="btn btn-green btn-xs" href="<?=site_url()?>/reservaciones/form_reservacion/<?=$key->us_id?>">Seleccionar</a></li>
															</ul>
														</td>
													</tr>
													<?php 
													} 
														}
													else { ?></br><h3>No se encontro el usuario que buscaba</h3><?php } ?>                           
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
</div>