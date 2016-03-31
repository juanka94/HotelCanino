 <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="images/logo.png" alt=""></a>
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2016 Hotel Canino Reyes.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Diseñado por <a href="">SSI</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
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

  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/wow.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/mousescroll.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/smoothscroll.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/jquery.countTo.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/lightbox.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/user/js/main.js"></script>

</body>
</html>

 