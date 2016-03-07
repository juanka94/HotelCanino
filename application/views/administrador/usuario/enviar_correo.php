  
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">
                </div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a href="">Usuarios</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href="#">Data Grid</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Agregar Usuarios</li>
        </ol>
        <div class="clearfix">
        </div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE-->
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div id="tab-general">
            <div class="row mbl">
                <div class="col-lg-12">     
                    <div class="col-md-12">
                        <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                        </div>
                    </div> 
                </div>
                <div class="col-lg-12">
                  <div class="row">
                        <div class="col-md-12">
                            <div class="row mtl">   
                              <div class="col-lg-7 col-sm-7 address">
                              <h3>
                                Enviar Recordatorio
                              </h3>
                              <div class="contact-form">
                                <form role="form">
                                  <div class="form-group">
                                    <label for="email">
                                      De :
                                    </label>
                                    <input type="email" placeholder="" id="email" class="form-control" value="contacto@hotelcaninoreyes.com" disabled="disabled">
                                  </div>
                                  <div class="form-group">
                                    <label for="email">
                                      Para :
                                    </label>
                                    <input type="email" placeholder="" id="email" class="form-control" value="<?=$usuario['correo']?>" disabled="disabled">
                                  </div>
                                  <div class="form-group">
                                    <label for="">
                                      Mensaje
                                    </label>
                                    <textarea placeholder="" rows="5" class="form-control">Buen día <?=$usuario['nombre']?> <?=$usuario['paterno']?> <?=$usuario['materno']?>.
                                    
                                    </textarea>
                                  </div>
                                  <button class="btn btn-info" type="submit">
                                    Enviar
                                  </button>
                                </form>

                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>