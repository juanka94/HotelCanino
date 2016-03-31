   <?php 
        $datos = $this->session->userdata('logged_user');
      $form = array('name'=>'contact-form');
      $submit = array('class' =>'btn btn-submit');
     ?>
    <div id="contact-us" class="parallax">
      <div class="container login">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Agregar Usuario</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-12">
            <?= form_open_multipart('usuarios/addusuario',$form) ?>
              <h3>Informacion Personal</h3>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="nom_usuario" class="form-control" placeholder="Nombre (s)" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="ap_paterno" class="form-control" placeholder="Apellido Paterno" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="ap_materno" class="form-control" placeholder="Apellido Materno" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="tel" name="tel_casa" class="form-control" placeholder="Tel. Casa">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="tel" name="tel_cel" class="form-control" placeholder="Tel. Celular" required="required">
                    </div>
                  </div>
                </div>
                <h3>Domicilio</h3>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="text" name="dom_calle" class="form-control" placeholder="Calle y No.">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="text" name="localidad" class="form-control" placeholder="Localidad">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select name="municipio" id="inputMunicipio" class="form-control">
                        <option value="Colima"> Colima </option>
                        <option value="Villa de Alvarez"> Villa de Alvarez </option>
                        <option value="Coquimatlan"> Coquimatlan </option>
                        <option value="Comala"> Comala </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="text" name="estado" class="form-control" placeholder="Estado">
                    </div>
                  </div>
                </div> 
                <h3>Datos para iniciar sesion</h3>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Correo Electronico" required="required">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Contraseña" required="required">
                    </div>
                  </div>
                    <?= @validation_errors(); ?>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input type="password" name="confpassword" class="form-control" placeholder="Confirmar Contraseña" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                   <div class="col-sm-2">
                    <label>Agregar Foto de Perfil</label>
                   </div>
                   <div class="col-sm-3">
                    <input type="file" name="imagen_usuario" />
                   </div>
                </div>
                <div class="form-group">
                <?= form_submit('', 'Crear',$submit) ?>
                </div>
               <?php echo (form_close()); ?>   
            </div>
        </div>
      </div>
    </div>        