
    
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Contacto
            </h1>
          </div>
          <div class="col-lg-8 col-sm-8">
            <ol class="breadcrumb pull-right">
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              <li>
                <a href="#">
                  Pages
                </a>
              </li>
              <li class="active">
                Contacts
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->



    <!--container start-->
    <div class="container">


      <div class="row">
        <div class="col-lg-5 col-sm-5 address">
          <section class="contact-infos">
            <h4 class="title custom-font text-black">
              DIRECCION 
            </h4>
            <address>
              Calle Independencia No.53,
              <br>
              Rancho de Villa,
              <br>
              Colima, Colima
            </address>
          </section>
          <section class="contact-infos">
            <h4 class="title custom-font text-black">
              HORARIOS
            </h4>
            <p>
              Monday - Friday 8am to 4pm
              <br>
              Saturday - 7am to 6pm
              <br>
              Sunday- Closed
              <br>
            </p>
          </section>
          <section class="contact-infos">
            <h4>
              TELEFONOS
            </h4>
             <p><i class="fa fa-mobile pr-10"></i>Celular : (044) 312 140 60 16</p>
            <p><i class="fa fa-phone pr-10"></i>Telefono : (312) 30 8 16 00</p>
          </section>
        </div>
        <div class="col-lg-7 col-sm-7 address">
          <h4>
            Envianos un correo electronico y resolveremos tus dudas
          </h4>
          <div class="contact-form">
            <form role="form">
              <div class="form-group">
                <label for="name">
                  Nombre
                </label>
                <input type="text" placeholder="" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">
                  Email
                </label>
                <input type="text" placeholder="" id="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">
                  Telefono
                </label>
                <input type="text" id="phone" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">
                  Mensaje o Duda
                </label>
                <textarea placeholder="" rows="5" class="form-control">
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
    <!--container end-->

    <!--google map start-->
    <div class="contact-map">
      <div id="map-canvas" style="width: 100%; height: 400px">
      </div>
    </div>
    <!--google map end-->
    <script>
      $(document).ready(function() {
        //Set the carousel options
        $('#quote-carousel').carousel({
          pause: true,
          interval: 4000,
        }
                                     );
      }
                       );

      //google map
      function initialize() {
        var myLatlng = new google.maps.LatLng(51.508742,-0.120850);
        var mapOptions = {
          zoom: 5,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Contact'
        }
                                           );
      }
      google.maps.event.addDomListener(window, 'load', initialize);



    </script>


 