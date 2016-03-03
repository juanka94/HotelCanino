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
      <div class="container" style="margin-top:40px">
        <div class="row">
            <div>
                <form class="form-horizontal" action="<?php echo base_url();?>index.php/usuarios/editar_usuario" method="POST">
                    <fieldset>  
                    <div class="control-group">
                        <!-- Username -->
                        <h1>Editar Registro</h1>
                      <?php echo validation_errors(); ?>
                        <label class="control-label"  for="username">Nombre</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo($us_nombre);?>" id="name" name="us_nombre" placeholder="" class="form-control" >
              
                        </div>
                      </div>
                      
                       <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">ap patern</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_ap_paterno);?>"  name="us_ap_paterno" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                       <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">ap mater</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_ap_materno);?>" name ="us_ap_materno" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                       <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">casa</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_tel_casa);?>"  name="us_tel_casa" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                       <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">cel</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_tel_cel);?>"  name="us_tel_cel" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                       <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">calle</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_dom_calle);?>"  name="us_dom_calle" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                      <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">localida</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_dom_localidad);?>"  name="us_dom_localidad" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                      <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">municipi</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_dom_calle);?>"  name="us_dom_municipio" placeholder="" class="form-control">
                         
                        </div>
                      </div>
                      <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">estado</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_dom_estado);?>" name="us_dom_estado"  placeholder="" class="form-control">
                         
                        </div>
                      </div>
                      <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">email</label>
                        <div class="controls">
                          <input type="text" value="<?php echo($us_email);?>"  name="us_email" placeholder="" class="form-control">
                         
                        </div>
                      </div>

                        <!-- Password-->
                        <label class="control-label" for="password">Nueva Contraseña</label>
                        <div class="controls">
                          <input type="password" value="<?php echo($us_password);?>" name="us_password" id="password" name="password" placeholder="" class="form-control">
                         <p class="help-block">Contraseña actual <?php echo($us_password);?></p>
                        </div>
                        <div class="controls">
                        </br>
                          <button type="submit" class="btn btn-success">Guardar</button>
                        </div>  
                      </div>  
                    </fieldset>
                  </form>
            </div>
        </div>
      </div>
