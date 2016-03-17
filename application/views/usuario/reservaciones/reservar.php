   <?php 
        $datos = $this->session->userdata('logged_user');
        $hidden = array('id_serv_redondo' => $id_serv_redondo, 'id_serv_sencillo' => $id_serv_sencillo, 'num_mascota' => $num_mascota);
?>
<!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Registro de reservacion</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li class="active">Reservacion</li>
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
    <div class="registration-bg">
        <div class="container">
        <?= form_open('usuarios/addreservacion',$form,$hidden); ?>
                <h2 class="form-signin-heading">Informacion de Rerservacion</h2>
                <div class="login-wrap">
                <h3>Fecha y Hora</h3>
                <label>Fecha y Hora de entrada</label>
                <!--<input type="text" name="fech_in" id="input" class="form-control" value="" placeholder="fecha de entrada">-->
                <input type="text" name="fech_in" class="form-control" id="datetimepicker_fecha_in"/>
                <label>Fecha y Hora de salida</label>
                <!--<input type="text" name="fech_out" id="input" class="form-control" value="" placeholder="fecha de salida">-->
                <input type="text" name="fech_out" class="form-control" id="datetimepicker_fecha_out"/>
                <hr>
                <!--<h3>Datos del Canino</h3>
                <label>Nombre del Canino</label>
                <input type="text" name="nom_mascota" id="input" class="form-control" value="" placeholder="Nombre">
                <label>Tamaño (Con Respecto al peso)</label>  
                    <select name="tamaños" id="input" class="form-control">
                        <option value="1">Pequeño (Menor a 4Kg)</option>
                        <option value="2">Mediano (entre 4 kg y 12 kg)</option>
                        <option value="3">Grande (entre 12 kg y 35 kg)</option>
                        <option value="4">Extra Grande (entre 35 kg y adelante)</option>
                    </select>
                </br>
                <label>Edad</label>
                <input type="text" name="edad" id="inputEdad" class="form-control" value="" placeholder="Edad del Canino">
                <label>Raza</label>
                <input type="text" name="raza" id="input" class="form-control" value="" placeholder="Raza del Canino">
                <label>Color</label>
                <input type="text" name="color" id="inputColor" class="form-control" value="" placeholder="Color del Canino">
                <label>Sexo</label> 
                    <select name="generos" id="input" class="form-control">
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>
                    </select>
                    </br>
                <label>¿Esterilizado?</label>
                <label class="radio-inline"><input type="radio" name="esterilizado" value="1">Si</label>
                <label class="radio-inline"><input type="radio" name="esterilizado" value="0">No</label>
                </br>
                <label>¿A que hora come?</label>
                <input type="text" name="hora_comida" id="input" class="form-control" value="">
                <label>¿Recibe algun tratamiendo medico?</label></br>
                <label class="radio-inline"><input type="radio" name="medicamento" value="1">Si</label>
                <label class="radio-inline"><input type="radio" name="medicamento" value="0">No</label>
                  <label>¿Es agresivo con perros y/o personas desconocidos?</label></br>
                <label class="radio-inline"><input type="radio" name="agresivo" value="1">Si</label>
                <label class="radio-inline"><input type="radio" name="agresivo" value="0">No</label>
                <br/>
                <label>Observaciones</label>
                <textarea name="observaciones" class="form-control"></textarea>-->

                <h3>Canes</h3>
                <label>Elije a 3 perros</label>
                <br>

                <div class="checkbox">
                <?php 
                $num = 0;
                    foreach ($mascota as $key) { ?>
                    <label>
                        <input type="checkbox" name="mascota<?=$num?>" value="<?=$key['id']?>"><?=$key['nombre']?><br>
                    </label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="1" name="baño_salida<?=$num?>">Baño de Salida $50.00<br>
                         </label>
                     </div>
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" value="1" name="rev_veterinaria<?=$num?>">Revision Veterinaria $40.00<br>
                         </label>
                     </div>
                    <?php $num++; } ?>
                 </div>

                <hr>
                <h3>Servicios adicionales</h3>
                <label>Recojer a domicilio</label>
                <br/>
                <span><input type="radio" value="false" name="shipping" id="shipping_false" checked="checked"><label for="shipping_false" class="collection_radio_buttons">No</label></span>

                <span><input type="radio" value="true" name="shipping" id="shipping_true"><label for="shipping_true" class="collection_radio_buttons">Si</label></span>
                <br/>

                <input id="shipping_cost" class="currency optional" type="text" name="shipping_cost" disabled="disabled"
                value="<?=($datos->us_dom_calle);?>"><a href="" data-toggle="modal" data-target="#myModal2"> Este no es mi domicilio</a>

                </input>



                <!--
                <select id="item_shipping_cost" class="currency optional" type="text" name="item[shipping_cost]" disabled="disabled">
                  <option>Elige tu municipio</option>
                  <option value="1">Colima y Villa de alvarez</option>
                  <option value="2">Coquimatlan</option>
                </select>
                  -->
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="true" name="serv_domicilio_redondo">
                         Viaje redondo
                     </label>
                 </div>
               
                <!--<hr/>
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="true" name="baño_salida">
                         Baño de Salida $50.00
                     </label>
                 </div>
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="true" name="rev_veterinaria">
                         Revision Veterinaria $40.00
                     </label>
                 </div>-->
                 <h3 id="total_redondo">Precio viaje sencillo:</h3>
                 <h3 id="total_sencillo">Precio viaje redondo:</h3>
                 <hr/>
                 <div class="checkbox">
                     <label>
                         <input type="checkbox" value="">
                         Aceptas Terminos y Condiciones <a href="" data-toggle="modal" data-target="#myModal">leer</a>
                     </label>
                 </div>
                 </br></br>
                <?= form_submit('', 'reservar',$submit) ?>
               
                </div>
            <?= form_close(); ?>

            


        </div>
     </div>
    <!--container end-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terminos y Condiciones</h4>
      </div>
      <div class="modal-body">
        <p style="text-align: justify;">INFORMACIÓN NECESARIA AL ADQUIRIR LOS SERVICIOS DEL HOTEL CANINO REYES</br>
El horario del Hotel Canino Reyes es de 8:00 horas a 18:00 horas, con horario corrido, de lunes a domingo. El horario de entrada y salida (Check In/Check Out) de huéspedes no es una hora fija, sino dentro del rango de 8:00 horas a 18:00 horas. Después de este horario ya no se entregan ni se reciben perritos y se carga automáticamente la siguiente noche a la cuenta del cliente. </br>
El servicio a domicilio está disponible para cualquier lugar o población. Se maneja con reservación anticipada  por lo menos de 2 horas antes y está sujeto a disponibilidad de agenda. El  horario de la primera recolección o entrega es de 8:30 horas, la última recolección o entrega a 18.00 horas y tiene un costo extra según la distancia del domicilio.
Los servicios del Hotel Canino Reyes no garantizan la salud del canino, ya que influyen muchos factores externos a su salud como: alimentación, genética, condición del perrito, edad, experiencias, aspectos hereditarios, hábitos, estado anímico, defensas, historial clínico, comportamiento, entre otras.</br>
El Hotel Canino Reyes ofrece la mayor calidad en sus servicios de supervisar las actividades y realizar los cuidados de higiene, alimentación y socialización adecuados y personalizados para cada perrito. Con su personal profesional en entrenamiento y comportamiento canino. Sin embargo, por el bien del perrito y sus cuidados, cuentan con servicios veterinarios disponibles las 24 horas.</br>
Es importante saber que con la filosofía siempre libres del Hotel Canino Reyes, los perros interactúan entre sí, dando a entender que su forma de jugar es con garras, empujones, mordidas y correr a toda velocidad por las áreas de juego. Por lo tanto pueden surgirse pequeños golpes, raspones y heridas simples que serán atendidas y desinfectadas por el personal del hotel.</br>
El cansancio, el polvo, el pasto, la tierra e intercambio de bacterias entre los mismos perros al jugar, también se deben de tomar en cuenta por parte del dueño al regreso del perrito a su hogar. Es por eso que un perro con la mejor vacunación y defensas tendrá la posibilidad de divertirse más dentro del Hotel Canino Reyes. </br>
En caso de una emergencia: 
Es importante que los datos de contacto proporcionados sean localizables por el personal del Hotel Canino Reyes. Y los datos de cuidado y características sean lo más precisos posibles para sus perrito.
Recibirá una llamada del personal del Hotel Canino Reyes para pedir autorización de cualquier tipo de duda en la salud y bienestar del perrito, así poder proceder en adicionarle servicios a su perrito con costo extra a su cuenta.  
En caso de no poder contactar a los teléfonos proporcionados para la autorización de intervención médica, y su perrito se encuentre en una emergencia médica, la cuenta del cliente queda abierta a costos de hospitalización, ya que a ningún huésped se le negarán los servicios médicos y se atenderá a consideración de la veterinaria. 
Los costos varían de acuerdo al tipo de servicio veterinario: Servicio a domicilio a veterinaria (40 pesos). Requerimiento de consulta médica a las instalaciones del Hotel (150 pesos). Medicamento, consulta u otros servicios veterinarios (según la cuenta de la veterinaria).
El servicio de Hospedaje y Guardería NO INCLUYE: Servicio a domicilio, Baño de limpieza al entregar, Entrenamiento, Terapias u otros Servicios Veterinarios. (Son con costo extra)
Nos reservamos el derecho de admisión por diferentes razones: de enfermedad, condición o  posibilidad de riesgo con el mismo perrito, otros huéspedes o con el personal del hotel mismo.</br>
GRACIAS POR SU PREFERENCIA
</p>
</div>
</div>/
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Servicio a Domicilio</h4>
      </div>
        <div class="modal-body">
        <p style="text-align: justify;">
        En caso de no ser el domicilio mostrado el domicilio donde quieres que recoja a tu mascota, procede lo siguiente: </br>
        1.- Localiza tu nombre de usuario ubicado en la parte superio derecha.</br>
        2.- Ingresas a la opcion llamada <strong>Mi Perfil</strong>.</br>
        3.- Posteriormente a la opcion llamada <strong> Editar mi perfil</strong>, y cambiamos el apartado domicilio a donde se quiere que se aplique el servicio a domicilio.</br></br>

        <h2>Si tienes alguna duda no dudes en preguntarnos puedes contactarnos por telefono o envianos un correo</h2></br>
        Celular : (044) 312 140 60 16</br>
        
        Telefono : (312) 30 8 16 00</br>

        Email : contacto@hotelcaninoreyes.com
        </p>
        </div>
    </div>/
  </div>
</div>

