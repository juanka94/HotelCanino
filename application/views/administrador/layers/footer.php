   <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <div id="footer">
                    <div class="copyright">
                        <a href="">2016 © Hotel Canino Reyes</a></div>
                </div>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>

    <!--Datapicker-->
    <script src="<?= base_url() ?>assets/datetimepicker-master/jquery.js"></script>
    <script src="<?= base_url() ?>assets/datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
    <script>

        $.datetimepicker.setLocale('es'); 

        $('#datetimepicker_fecha_in').datetimepicker({
            allowTimes:['8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30','13:00','13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30']
        });

        $('#datetimepicker_fecha_out').datetimepicker({
            allowTimes:['8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30','13:00','13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30']
        });

        $('#datepicker_fecha').datetimepicker({
           timepicker: false
        });
        
    </script>

    <script src="<?= base_url(); ?>assets/admin/script/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/bootstrap-hover-dropdown.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/html5shiv.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/respond.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.metisMenu.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.slimscroll.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.cookie.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/icheck.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/custom.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.news-ticker.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.menu.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/holder.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/responsive-tabs.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.categories.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.pie.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.tooltip.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.resize.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.fillbetween.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.stack.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/jquery.flot.spline.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/zabuto_calendar.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="<?= base_url(); ?>assets/admin/script/highcharts.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/data.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/drilldown.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/exporting.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/highcharts-more.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/charts-highchart-pie.js"></script>
    <script src="<?= base_url(); ?>assets/admin/script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="<?= base_url(); ?>assets/admin/script/main.js"></script>
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-145464-12', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>
