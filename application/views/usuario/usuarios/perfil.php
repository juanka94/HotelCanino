<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
       <h2><a href="<?= site_url()?>/usuarios/perfil">Editar Perfil</a></h2>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
       <h2><a href="<?= site_url()?>/usuarios/agregar_mascota">Agregar Perritos</a></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $num = 1;
            foreach ($mascota as $key) { ?>
          <tr>
            <td><?=$num; ?></td>
            <td><?=$key['mas_nombre']?></td>
            <td><img src="<?= base_url();?>assets/user/images/imagenes/perros/" class="img-responsive" alt="Image"></td>
            <td><a href="" title="Editar"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a href="" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
          </tr>
        <?php $num++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

 

   