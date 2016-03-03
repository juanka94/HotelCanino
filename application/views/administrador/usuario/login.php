<?php 
      $form = array('class' =>'form-horizontal');
      $submit = array('class' =>'btn btn-default');
?>
<body style="background: url('<?= base_url() ?>assets/admin/images/bg/bg.png') center center fixed;">
    <div class="page-form">
        <div class="panel panel-blue">
            <div class="panel-body pan">
                <?= form_open('administradores/login',$form) ?>
                <div class="form-body pal">
                    <div class="col-md-12 text-center">
                        <h1 style="margin-top: -90px; font-size: 48px;">
                            Hotel Canino Reyes</h1>
                        <br />
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <img src="<?= base_url() ?>assets/admin/images/avatar/profile-pic.png" class="img-responsive" style="margin-top: -35px;" />
                        </div>
                        <div class="col-md-9 text-center">
                            <h1>
                                Bienvenido</h1>
                            <br />
                            <p>
                                Ingresa tu NOMBRE y CONTRASEÑA para entrar al sistema, Gracias.</p>
                        </div>
                    </div>
                     <?= @validation_errors(); ?>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Nombre:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <input id="inputName" type="text" placeholder="" class="form-control" name="name" required="required" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Contraseña:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <input id="inputPassword" type="password" placeholder="" class="form-control" name="password" required="required" /></div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <?= form_submit('', 'Entrar',$submit) ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
          <?php echo (form_close()); ?>
            </div>
        </div>
    </div>