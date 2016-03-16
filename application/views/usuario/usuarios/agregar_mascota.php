   <?php 
        $datos = $this->session->userdata('logged_user');
?>
<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Agregar Mascota</h1>
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
            <?= form_open('usuarios/addmascota',$form) ?>
            <h2 class="form-signin-heading">Agregar Mascota </h2> 

            <div class="login-wrap">
                <input type="text" name="nombre_mascota"  class="form-control" value="" placeholder="Nombre" autofocus>
                <input type="text" name="raza_mascota"  class="form-control" value="" placeholder="Raza" autofocus>
                <label>Genero</label>
                <select name="genero_mascota" id="input" class="form-control">
                    <option value="1">  Macho  </option>
                    <option value="0">  Hembra  </option>
                </select>
                 </br>
                <input type="text" name="color_mascota"  class="form-control" value="" placeholder="Color" autofocus>
                <input type="text" name="edad_mascota"  class="form-control" value="" placeholder="Edad" autofocus>
                <input type="text" name="hora_comida_mascota"  class="form-control" value="" placeholder="¿A que hora come?" autofocus>
                <select name="tamaño_mascota" id="input" class="form-control">
                    <option value="1">  Pequeño  </option>
                    <option value="2">  Mediano  </option>
                    <option value="3">  Grande  </option>
                    <option value="4">  Extra Grande  </option>
                </select>
                </br>
                <label>¿Esta Esterilizado?</label>
                <select name="esterilizado_mascota" id="input" class="form-control">
                    <option value="1">  Si  </option>
                    <option value="0">  No  </option>
                </select>
                 </br>
                 <label>¿Es Agresivo?</label>
                <select name="agresivo_mascota" id="input" class="form-control">
                    <option value="1">  Si  </option>
                    <option value="0">  No  </option>
                </select>
                 </br>
                 <label>¿Toma Algun medicamento o Tratamiento medico?</label>
                <select name="medicamento_mascota" id="input" class="form-control">
                    <option value="1">  Si  </option>
                    <option value="0">  No  </option>
                </select>
                 </br>
                 <label>Observaciones</label>
                <textarea name="observaciones_mascota" id="input" class="form-control" rows="10"></textarea>
                </br>
                <input type="hidden" name="id_usuario" id="inputId_usuario" class="form-control" value="<?=$datos->us_id?>">
                <?= form_submit('', 'Agregar',$submit) ?>

            </div>

          <?php echo (form_close()); ?>
          </div>
        </div>
    </div>
    <!--container end-->
