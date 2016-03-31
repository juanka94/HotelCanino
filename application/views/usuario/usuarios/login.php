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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a class="" href="<?= site_url()?>/usuarios/crear_usuario">
                        Crear una cuenta
                    </a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
