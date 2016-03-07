   <?php 
        $datos = $this->session->userdata('logged_user');
?>
   <!--header start-->
<header class="head-section">
  <div class="navbar navbar-default navbar-static-top container">
    <div class="navbar-header">
              <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse"
              type="button"><span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span></button>
    </div>

          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li>
                      <?= anchor('usuarios/index', 'Inicio')?>
                  </li>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                      "dropdown" data-toggle="dropdown" href="#">Servicios <i class="fa fa-angle-down"></i>
                      </a>

                      <ul class="dropdown-menu">
                          <li >
                              <a href="<?= site_url()?>/usuarios/hospedaje">Hospedaje</a>
                          </li>

                          <li>
                              <a href="<?= site_url()?>/usuarios/guarderia">Guarderia</a>
                          </li>
                           <li>
                              <a href="<?= site_url()?>/usuarios/entrenamiento">Entrenamiento</a>
                          </li>
                      </ul>
                  </li>

                  
                  <li>
                      <a href="<?= site_url()?>/usuarios/galeria">Galeria</a>
                  </li>
                   <li>
                      <a href="<?= site_url()?>/usuarios/reservar">Reservar</a>
                  </li>
                  <li>
                      <a href="<?= site_url()?>/usuarios/contacto">Contacto</a>
                  </li>

                  <li><input class="form-control search" placeholder=" Buscar" type="text"></li>
                    <?php if (!$this->session->userdata('logged_user')){?>
                  <li>
                      <a href="<?= site_url()?>/usuarios/login"><i class="fa fa-user pr-10"></i> Iniciar Sesion</a>
                  </li>
                  <?php }else {?>
                  <li class="dropdown">
                      <a class="dropdown-toggle" data-close-others="false" data-delay="0" data-hover=
                      "dropdown" data-toggle="dropdown" href="#">Hola! <?php echo($datos->us_nombre);?></i>
                      </a>
                      <ul class="dropdown-menu">
                          <li>
                              <a href="<?= site_url()?>/usuarios/perfil">Mi perfil</a>
                          </li>

                          <li>
                              <a href="<?= site_url()?>/usuarios/logout">Cerrar Sesion</a>
                          </li>

                      </ul>
                  </li>
                  <?php } ?>
              </ul>
          </div>
  </div>
</header>
    <!--header end-->