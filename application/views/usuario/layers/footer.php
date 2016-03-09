
<!--footer start-->
     <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                     <h1>Informacion de Contacto</h1>
                     <address>
                         <p><i class="fa fa-home pr-10"></i>Direccion:  Calle Independencia No.53</p>
                         <p><i class="fa fa-globe pr-10"></i>Rancho de Villa, Colima </p>
                         <p><i class="fa fa-mobile pr-10"></i>Celular : (044) 312 140 60 16</p>
                         <p><i class="fa fa-phone pr-10"></i>Telefono : (312) 30 8 16 00</p>
                         <p><i class="fa fa-envelope pr-10"></i>Email : <a href="javascript:;">contacto@hotelcaninoreyes.com</a></p>
                     </address>
                 </div>
                <div class="col-lg-5 col-sm-5 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                    <h1 align="center">Ultimas Noticias</h1>
                    <div id="owl-slide">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-page" data-href="https://www.facebook.com/hotelcaninoreyes/" data-tabs="timeline" data-width="500" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/hotelcaninoreyes/"><a href="https://www.facebook.com/hotelcaninoreyes/">Hotel Canino Reyes</a></blockquote>
                    </div></div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                    <h1>Preguntas Frecuentes</h1>
                    <ul class="page-footer-list">
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">¿Como llego al hotel canino reyes?</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">Reservaciones y Cancelaciones</a></li>    
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">Requisitos y Horarios</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">Equipaje o Alimentacion Especial</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">Servicio a Domicilio</a></li>    
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">Descuentos y Promociones</a></li>
                    <li><i class="fa fa-angle-right"></i><a href="<?= site_url()?>/usuarios/preguntas">Emergencias</a></li>
                    </ul>
                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pull-right">
                    <ul class="social-link-footer list-unstyled">
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="https://www.facebook.com/hotelcaninoreyes/?fref=ts" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i class="fa fa-twitter" target="_blank"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".6s"><a href="#"><i class="fa fa-instagram" target="_blank"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".7s"><a href="https://www.youtube.com/watch?v=byo_-ubRn6c" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                  <div class="copyright">
                    <p>2016 © Hotel Canino Reyes</p>
                  </div>
                </div>
            </div>
        </div>
    </footer>
     <!--small footer end-->
 <!-- js placed at the end of the document so the pages load faster
<script src="js/jquery.js">
</script>
-->
 <script>  
        $('#shipping_true').click(function()
        {
            $('#shipping_cost').show('fast');

            var precio_serv_dom_redondo = "<?= $precio_serv_dom_redondo?>";

            if (precio_serv_dom_redondo < 0) {
                $('#total_redondo').text("servicio a domicilo no desponible");
            }
            else
            {
                $('#total_redondo').text('Precio viaje redondo: '+precio_serv_dom_redondo);
            }

            var precio_serv_dom_sencillo = "<?= $precio_serv_dom_sencillo?>";

             if (precio_serv_dom_sencillo < 0) {
                $('#total_sencillo').text("servicio a domicilo no desponible");
            }
            else
            {
                $('#total_sencillo').text('Precio viaje sencillo: '+precio_serv_dom_sencillo);
            }
        });

        $('#shipping_false').click(function()
        {
          $('#shipping_cost').hide('fast');
        });
    </script>

    <!--Datapicker-->
    <script src="<?= base_url() ?>assets/datetimepicker-master/jquery.js"></script>
    <script src="<?= base_url() ?>assets/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <script>

        $.datetimepicker.setLocale('es'); 

        $('#datetimepicker_fecha_in').datetimepicker({
            allowTimes:['8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30','13:00','13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30']
        });

        //aqui va una funcion que borre por accidente

        $('#datetimepicker_fecha_out').datetimepicker({
                allowTimes:['8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30','13:00','13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30']
            });
        
    </script>



    <script src="<?= base_url() ?>assets/user/assets/jquery-1.12.1.js"></script>
    <script src="<?= base_url() ?>assets/user/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/user/js/hover-dropdown.js"></script>
    <script defer src="<?= base_url() ?>assets/user/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/user/assets/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/user/js/jquery.parallax-1.1.3.js"></script>
    <script src="<?= base_url() ?>assets/user/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/user/assets/owlcarousel/owl.carousel.js"></script>
    <script src="<?= base_url() ?>assets/user/js/mixitup.js"></script>
    <script src="<?= base_url() ?>assets/user/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/user/js/link-hover.js"></script>
    <script src="<?= base_url() ?>assets/user/js/superfish.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/user/js/parallax-slider/jquery.cslider.js">
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&AMP;sensor=false"></script>


    <!--common script for all pages-->
    <script src="<?= base_url() ?>assets/user/js/common-scripts.js"></script>

    <script src="<?= base_url() ?>assets/user/js/revulation-slide.js"></script>
    <script src="<?= base_url() ?>assets/user/js/jquery.magnific-popup.js"></script>

    

    <script>  
        $('#shipping_true').click(function()
        {
            $('#shipping_cost').show('fast');

            var precio_serv_dom_redondo = "<?= $precio_serv_dom_redondo?>";

            if (precio_serv_dom_redondo < 0) {
                $('#total_redondo').text("servicio a domicilo no desponible");
            }
            else
            {
                $('#total_redondo').text('Precio viaje redondo: '+precio_serv_dom_redondo);
            }

            var precio_serv_dom_sencillo = "<?= $precio_serv_dom_sencillo?>";

             if (precio_serv_dom_sencillo < 0) {
                $('#total_sencillo').text("servicio a domicilo no desponible");
            }
            else
            {
                $('#total_sencillo').text('Precio viaje sencillo: '+precio_serv_dom_sencillo);
            }
        });

        $('#shipping_false').click(function()
        {
          $('#shipping_cost').hide('fast');
        });
    </script>

     <script type="text/javascript">
    $('.image-caption a').tooltip();
    $(function () {

        var filterList = {

            init: function () {

                // MixItUp plugin
                // http://mixitup.io
                $('#portfoliolist').mixitup({
                    targetSelector: '.portfolio',
                    filterSelector: '.filter',
                    effects: ['fade'],
                    easing: 'snap',
                    // call the hover effect
                    onMixEnd: filterList.hoverEffect()
                });

            },

            hoverEffect: function () {
                $("[rel='tooltip']").tooltip();
                // Simple parallax effect
                $('#portfoliolist .portfolio .portfolio-hover').hover(
        function(){
            $(this).find('.image-caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.image-caption').slideUp(250); //.fadeOut(205)
        }
    );



            }

        };

        // Run the show!
        filterList.init();


    });

    $( document ).ready(function() {

        $('.magnefig').each(function(){
            $(this).magnificPopup({
                type:'image',
                removalDelay: 300,
                mainClass: 'mfp-fade'
            })
        });
    });
    </script>


    <script>
      wow = new WOW(
        {
          boxClass:     'wow',      // default
          animateClass: 'animated', // default
          offset:       0          // default
        }
      )
        wow.init();
    </script>


    
    
    </body>
    </html>

    