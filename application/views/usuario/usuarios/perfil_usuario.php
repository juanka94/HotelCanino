   <?php 
          foreach ($usuario as $value) {
            $us_nombre=$value['us_nombre'];
            $us_ap_paterno=$value['us_ap_paterno'];
            $us_ap_materno=$value['us_ap_materno'];
            $us_tel_casa=$value['us_tel_casa'];
             $us_tel_cel=$value['us_tel_cel'];
             $us_dom_calle=$value['us_dom_calle'];
             $us_dom_localidad=$value['us_dom_localidad'];
             $us_dom_municipio=$value['us_dom_municipio'];
             $us_dom_estado=$value['us_dom_estado'];
             $us_email=$value['us_email'];
             $us_password=$value['us_password'];
          }
        ?>
        


      <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Editar usuario</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Usuarios</a></li>
                        <li class="active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
    <?php 
      $form = array('class' =>'form-signin wow fadeInUp');
      $submit = array('class' =>'btn btn-lg btn-login btn-block');
     ?>
    <!--container start-->
    <div class="login-bg">
        <div class="container">
        <?php echo validation_errors(); ?>


            <div class="form-wrapper">
            <?= form_open('usuarios/editar_usuario',$form) ?>
            <h2 class="form-signin-heading">Editar Perfil </h2> 

            <div class="login-wrap">
                <label class="control-label"  for="username">Nombre</label>
<input type="text"  value="<?php echo($us_nombre);?>" id="name" name="us_nombre" placeholder="" class="form-control" >
<label class="control-label" for="email">ap patern</label>
 <input type="text" value="<?php echo($us_ap_paterno);?>"  name="us_ap_paterno" placeholder="" class="form-control">
<label class="control-label" for="email">ap mater</label>
 <input type="text" value="<?php echo($us_ap_materno);?>" name ="us_ap_materno" placeholder="" class="form-control">
 <label class="control-label" for="email">casa</label>
<input type="text" value="<?php echo($us_tel_casa);?>"  name="us_tel_casa" placeholder="" class="form-control">
<label class="control-label" for="email">cel</label>
 <input type="text" value="<?php echo($us_tel_cel);?>"  name="us_tel_cel" placeholder="" class="form-control">
<label class="control-label" for="email">calle</label>
<input type="text" value="<?php echo($us_dom_calle);?>"  name="us_dom_calle" placeholder="" class="form-control">
 <label class="control-label" for="email">localida</label>
<input type="text" value="<?php echo($us_dom_localidad);?>"  name="us_dom_localidad" placeholder="" class="form-control">
 <label class="control-label" for="email">municipio</label>
 <input type="text" value="<?php echo($us_dom_municipio);?>"  name="us_dom_municipio" placeholder="" class="form-control">
<label class="control-label" for="email">estado</label>
<input type="text" value="<?php echo($us_dom_estado);?>" name="us_dom_estado"  placeholder="" class="form-control">
 <label class="control-label" for="email">email</label>
<input type="text" value="<?php echo($us_email);?>"  name="us_email" placeholder="" class="form-control">
<label class="control-label" for="password">Nueva Contraseña</label>
 <input type="password" value="<?php echo($us_password);?>" name="us_password" id="password" name="password" placeholder="" class="form-control">
  <div class="registration">
Contraseña actual <?php echo($us_password);?>

                </div>

            </div>
 <?= form_submit('', 'Actualizar',$submit) ?>
          <?php echo (form_close()); ?>
          </div>
        </div>
    </div>
    <!--container end-->

