   <?php 
        $datos = $this->session->userdata('logged_user');
        $hidden = array('id_serv_redondo' => $id_serv_redondo, 'id_serv_sencillo' => $id_serv_sencillo, 'num_mascota' => $num_mascota);
        $form = array('id'=>'main-contact-form','name'=>'contact-form');
        $submit = array('class' =>'btn btn-submit');

     ?>




<div id="contact-us" class="parallax">
  <div class="container login">
    <div class="row">
      <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h1>Formulario de Reservacion</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
      </div>
    </div>
<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
    <div class="row">
      <div class="col-sm-12">
        <?= form_open('usuarios/addreservacion',$form,$hidden); ?>
          <div class="row  wow fadeInUp">
            <div class="col-sm-6">
              <div class="form-group">
                  <input type="text" name="fech_in" class="form-control" id="datetimepicker_fecha_in" placeholder="Fecha de Entrada" required="required"/>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                  <input type="text" name="fech_out" class="form-control" id="datetimepicker_fecha_out" placeholder="Fecha de Salida" required="required"/>
              </div>
            </div>
          </div>
      </div>
    </div>
   <h2>Canes</h2>
  <div class="row">
   <?php 
      $num = 0;
            foreach ($mascota as $key) { ?>
    <div class="col-sm-3">
      <div class="form-group">
          
                   
                    <div class="checkbox">
                    <label>
                        <input type="checkbox" name="mascota<?=$num?>" value="<?=$key['id']?>"><?=$key['nombre']?><br>
                    </label>
                      </div>
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
           
      </div>
    </div>
  <?php $num++; } ?>
  </div>


                <hr>
                <h2>Servicios adicionales</h2>
                <label>Recojer a domicilio</label>
                <br/>
                <span><input type="radio" value="false" name="shipping" id="shipping_false" checked="checked"><label for="shipping_false" class="collection_radio_buttons">No</label></span>

                <span><input type="radio" value="true" name="shipping" id="shipping_true"><label for="shipping_true" class="collection_radio_buttons">Si</label></span>
                <br/>

                <input id="shipping_cost" class="currency optional" type="text" name="shipping_cost" disabled="disabled"
                value="<?=($datos->us_dom_calle);?>"><a href="" data-toggle="modal" data-target="#myModal2"> Este no es mi domicilio</a></input>
                

                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="true" name="serv_domicilio_redondo">
                      Viaje redondo
                  </label>
                </div>

                <h3 id="total_redondo">Precio viaje sencillo:</h3>
                <h3 id="total_sencillo">Precio viaje redondo:</h3>
                <hr/>

                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="" required="required">
                      Acepto terminos y condiciones <a href="" data-toggle="modal" data-target="#terminos">leer</a>
                    </label>
                  </div>
                </div>    

                <div class="form-group">
                 <?= form_submit('', 'reservar',$submit) ?>
                </div>
               <?= form_close(); ?>
                    
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    </div>
  </div>
</div>       