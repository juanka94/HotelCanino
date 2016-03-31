   <?php 
        $datos = $this->session->userdata('logged_user');
      $form = array('name'=>'contact-form');
      $submit = array('class' =>'btn btn-submit');
     ?>
    
    <div id="contact-us" class="parallax">
      <div class="container login">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Agregar Perro</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-12">
              <?= form_open_multipart('usuarios/addmascota',$form) ?>
              <input type="hidden" name="id_usuario" id="inputId_usuario" class="form-control" value="<?=($datos->us_id);?>">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="nombre_mascota" class="form-control" placeholder="Nombre del Perro" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="raza_mascota" class="form-control" placeholder="Raza" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="edad_mascota" class="form-control" placeholder="Edad" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="color_mascota" class="form-control" placeholder="Color" required="required">
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label>Genero</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select name="genero_mascota" id="input" class="form-control">
                        <option value="1">  Macho  </option>
                        <option value="0">  Hembra  </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <label>Tamaño</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <select name="tamaño_mascota" id="input" class="form-control">
                        <option value="1">  Pequeño  </option>
                        <option value="2">  Mediano  </option>
                        <option value="3">  Grande  </option>
                        <option value="4">  Extra Grande  </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="hora_comida_mascota" class="form-control" required="required" placeholder="¿A que hora come?">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                    <label>¿Esta Esterilizado?</label>
                      <select name="esterilizado_mascota" id="input" class="form-control">
                        <option value="1">  Si  </option>
                        <option value="0">  No  </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                     <label>¿Es agresivo?</label>
                      <select name="agresivo_mascota" id="input" class="form-control">
                        <option value="1">  Si  </option>
                        <option value="0">  No  </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                     <label>¿Toma algun medicamento o tratamiento medico?</label>
                      <select name="medicamento_mascota" id="input" class="form-control">
                        <option value="1">  Si  </option>
                        <option value="0">  No  </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Puedes agregar alguna foto del perro</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                     <input type="file" name="imagen_perro">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <textarea name="observaciones_mascota" id="message" class="form-control" rows="4" placeholder="Algunas observaciones que quieras añadir" required="required"></textarea>
                </div>                        
                <div class="form-group">
                <?= form_submit('', 'Agregar',$submit) ?>
                </div>
              <?php echo (form_close()); ?></form>   
            </div>
          </div>
        </div>
      </div>
    </div>        
