   <?php 
        $datos = $this->session->userdata('logged_user');
?>
<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Login</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inicio</a></li>
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
            <?= form_open('usuarios/login',$form) ?>
            <h2 class="form-signin-heading">Iniciar Sesion </h2>  
             <div class='mensaje_resultado'> <?=$this->session->flashdata('resultado_insercion'); ?> </div>
            <?= @validation_errors(); ?>
            <div class="login-wrap">
                <input type="text" name="email" id="inputEmail" class="form-control" value="<?php echo @$_POST['email']; ?>" placeholder="Correo Electronico" autofocus>
                 <input type="password" name="password" id="inputEmail" class="form-control" value="<?php echo @$_POST['password']; ?>"  placeholder="Contraseña" autofocus>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Recordarme
                    <span class="pull-right">
                        <a data-toggle="modal" href="#myModal"> Olvide mi contraseña</a>
                    </span>
                </label>
                <?= form_submit('', 'Entrar',$submit) ?>
                <div class="registration">
                    No tienes una cuenta?
                    <a class="" href="<?= site_url()?>/usuarios/crear_usuario">
                        Crear una cuenta
                    </a>
                </div>

            </div>

          <?php echo (form_close()); ?>
          </div>
        </div>
    </div>
    <!--container end-->
