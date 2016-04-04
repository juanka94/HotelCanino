   <?php 
   $datos = $this->session->userdata('logged_user');
   $form = array('name'=>'contact-form');
   $submit = array('class' =>'btn btn-submit');
   ?>


     <div id="contact-us" class="parallax">
      <div class="container login">
        <div class="row ">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp " data-wow-duration="1000ms" data-wow-delay="300ms">
          <?= @validation_errors(); ?>
            <h1>Iniciar Sesion</h1>
          </div>
        </div>
        <div class="contact-form wow fadeIn " data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <?= form_open('usuarios/login',$form) ?>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Correo Electronico" required="required">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Contraseña" required="required">
                </div>                       
                <div class="form-group">
                <?= form_submit('', 'Entrar',$submit) ?>
                </div>
               <?php echo (form_close()); ?>
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Ahora puedes unirte al sistema del hotel canino reyes y recibir informacion acerca de de tu canino en su estancia, ademas puedes reservar desde la comodidad de tu hogar.</p>
                <p><h2>No tienes una cuenta? <a href="<?= site_url()?>/usuarios/crear_usuario">Unete</a></h2></p>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
