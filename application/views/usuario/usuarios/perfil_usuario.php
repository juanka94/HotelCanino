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
        
   
    <?php 
        $datos = $this->session->userdata('logged_user');
      $form = array('id'=>'main-contact-form','name'=>'contact-form');
      $submit = array('class' =>'btn btn-submit');
     ?>
    
    <div id="contact-us" class="parallax">
      <div class="container login">
      <?php echo validation_errors(); ?>
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Actualizar</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-12">
              <?= form_open_multipart('usuarios/editar_usuario',$form) ?>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_nombre);?>" name="us_nombre" class="form-control" placeholder="Nombre del Perro" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_ap_paterno);?>"  name="us_ap_paterno" class="form-control" placeholder="Raza" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_ap_materno);?>" name ="us_ap_materno" class="form-control" placeholder="Edad" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_tel_casa);?>"  name="us_tel_casa" class="form-control" placeholder="Color" required="required">
                    </div>
                  </div>
                 <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_tel_cel);?>"  name="us_tel_cel" class="form-control" placeholder="Color" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_dom_calle);?>"  name="us_dom_calle" class="form-control" required="required">
                    </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_dom_localidad);?>"  name="us_dom_localidad" class="form-control" required="required" >
                    </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_dom_municipio);?>"  name="us_dom_municipio" class="form-control" required="required" >
                    </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_dom_estado);?>" name="us_dom_estado" class="form-control" required="required" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_email);?>"  name="us_email" class="form-control" required="required" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" value="<?php echo($us_password);?>" name="us_password" class="form-control" required="required" >
                    </div>
                  </div>
                </div>
                                     
                <div class="form-group">
                <?= form_submit('', 'Actualizar',$submit) ?>
                </div>
              <?php echo (form_close()); ?></form>   
            </div>
          </div>
        </div>
      </div>
    </div>        


