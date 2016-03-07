<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Crear usuario</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li class="active">Login</li>
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


            <div class="form-wrapper">
            <?= form_open('usuarios/addusuario',$form) ?>
            <h2 class="form-signin-heading">Crear Usuario </h2> 

            <div class="login-wrap">
                <input type="text" name="nom_usuario"  class="form-control" value="<?php echo @$_POST['nom_usuario']; ?>" placeholder="Nombre" autofocus>
                <input type="text" name="ap_paterno"  class="form-control" value="<?php echo @$_POST['ap_paterno']; ?>" placeholder="A. Paterno" autofocus>
                <input type="text" name="ap_materno"  class="form-control" value="<?php echo @$_POST['ap_materno']; ?>" placeholder="A. Materno" autofocus>
                <input type="text" name="tel_casa"  class="form-control" value="<?php echo @$_POST['tel_casa']; ?>" placeholder="Tel. Casa" autofocus>
                <input type="text" name="tel_celular"  class="form-control" value="<?php echo @$_POST['tel_celular']; ?>" placeholder="Tel. Celula" autofocus>
                <input type="text" name="email"  class="form-control" value="<?php echo @$_POST['email']; ?>" placeholder="Correo" autofocus>
                <input type="password" name="password"  class="form-control" value="<?php echo @$_POST['password']; ?>" placeholder="Contraseña" autofocus>
                <input type="text" name="dom_calle"  class="form-control" value="<?php echo @$_POST['dom_calle']; ?>" placeholder="Domicilio Calle" autofocus>
                <input type="text" name="localidad"  class="form-control" value="<?php echo @$_POST['localidad']; ?>" placeholder="Localidad" autofocus>
                <input type="text" name="municipio"  class="form-control" value="<?php echo @$_POST['municipio']; ?>" placeholder="Municipio" autofocus>
                <input type="text" name="estado"  class="form-control" value="<?php echo @$_POST['estado']; ?>" placeholder="Estado" autofocus>

                <?= form_submit('', 'Crear',$submit) ?>
                <div class="registration">
                    Si tengo cuenta XD
                    <a class="" href="<?= site_url()?>/usuarios/login">
                        Entrar
                    </a>
                </div>

            </div>

          <?php echo (form_close()); ?>
          </div>
        </div>
    </div>
    <!--container end-->
