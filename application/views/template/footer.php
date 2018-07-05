<!-- footer content -->
<footer>
  <div class="pull-right">
    <!-- PLN Area Klaten Rayon Tulung - Website ini milik PLN Area Klaten Rayon Tulung -->
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->

<!-- jQuery -->
<!-- <script src="<?= base_url() ?>assets/gentelella/vendors/jquery/dist/jquery.min.js"></script>
 --><!-- Bootstrap -->
 <script src="<?php echo base_url() . 'assets/js/jQuery/jQuery-2.1.4.min.js '?>"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/gentelella/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>assets/gentelella/vendors/nprogress/nprogress.js"></script>
<!-- sweetAlert -->
<script src="<?= base_url() ?>assets/js/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/js/sweetalert/sweetalert-dev.js"></script>
<script src="<?= base_url() ?>assets/js/sweetalert/sweetalert-dev.js"></script>

<!-- Chart.js -->
<!-- <script src="<?= base_url() ?>assets/gentelella/vendors/Chart.js/dist/Chart.min.js"></script> -->
<!-- jQuery Sparklines -->
<!-- <script src="<?= base_url() ?>assets/gentelella/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- Flot -->
<!-- <script src="<?= base_url() ?>assets/gentelella/vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/Flot/jquery.flot.resize.js"></script> -->
<!-- Flot plugins -->
<!-- <script src="<?= base_url() ?>assets/js/flot/jquery.flot.orderBars.js"></script>
<script src="<?= base_url() ?>assets/js/flot/date.js"></script>
<script src="<?= base_url() ?>assets/js/flot/jquery.flot.spline.js"></script>
<script src="<?= base_url() ?>assets/js/flot/curvedLines.js"></script> -->
<!-- bootstrap-daterangepicker -->
<!-- <script src="<?= base_url() ?>assets/js/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/datepicker/daterangepicker.js"></script> -->
<!-- bootstrap-datepicker -->
<script src="<?= base_url() ?>assets/js/datepicker/bootstrap-datepicker.js"></script>
<!-- Datatables -->
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>assets/gentelella/build/js/custom.min.js"></script>

<!-- bootstrap-daterangepicker -->
<script>
$('#datatable-responsive').DataTable();
$(function() {
    $("#tgl").datepicker({
      minDate : 0,
      dateFormat: 'yyyy-mm-dd'
    });

  });
  $(document).ready(function() {

    $('input#tanggal_lahir').datepicker({
      // startDate: '1d',
      format: "yyyy-mm-dd"
    });
  });
</script>
<!-- /bootstrap-daterangepicker -->

<?= $script; ?>


</body>
</html>
