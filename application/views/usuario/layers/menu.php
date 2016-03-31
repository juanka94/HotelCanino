<?php $datos = $this->session->userdata('logged_user'); ?>

<div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
            <!--<h1><img class="img-responsive" src="imagenes/logos/logo.png" alt="logo"></h1>-->
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="<?= site_url()?>/usuarios/">Inicio</a></li>                 
            <li class="scroll"><a href="<?= site_url()?>/usuarios/galeria">Galeria</a></li>
            <li class="scroll"><a href="<?= site_url()?>/usuarios/reservar">Reservar</a></li> 
            <li class="scroll"><a href="<?= site_url()?>/usuarios/contacto">Contacto</a></li>
            <?php if (!$this->session->userdata('logged_user')){?>
            <li class="scroll"><a href="<?= site_url()?>/usuarios/login">login</a></li>   
            <?php }else {?>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola! <?php echo($datos->us_nombre);?> <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?= site_url()?>/usuarios/mi_perfil" style="color: black;">Mi perfil</a></li>
              <li><a href="<?= site_url()?>/usuarios/logout" style="color: black;">Cerrar sesion</a></li>
            </ul>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  