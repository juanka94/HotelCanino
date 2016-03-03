<div id="page-wrapper">
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">
            Habitaciones</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right">
        <li><i class="fa fa-home"></i>&nbsp;<a href="">Lugares</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Disponibles</li>
    </ol>
    <div class="clearfix">
    </div>
</div>
<!--END TITLE & BREADCRUMB PAGE-->
<div class="page-content">
    <div id="tab-general">
    <div class="table-responsive">
        <table class="table col-xs-1" align="center" >
            <tbody>
            <?php
                $num_habitacion = 1;
                $result = array();
                
                if($disponible){
                    foreach ($lugares as $key => $value) {
                        $result[] = $value->res_no_habitacion;
                    }
                }

                for ($i=0; $i < 6; $i++) { 
            ?>
                <tr>
                    <?php for ($j=0; $j < 6; $j++) { 
                        if (!in_array($num_habitacion, $result)) 
                        {
                    ?>
                        <td><a><img src="<?= base_url()?>assets/admin/images/icons/disponible.png" title="Disponible"><br/>Habitacion <?= $num_habitacion?></a></td>
                    <?php  }
                        else {?>
                        <td><a href="<?= site_url()?>/habitaciones/detalles/<?=$num_habitacion?>"><img src="<?= base_url()?>assets/admin/images/icons/no_disponible.png" title="No disponible"><br/>Habitacion <?= $num_habitacion?></a></td>
                    <?php } $num_habitacion++; }?>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    </div>
</div>