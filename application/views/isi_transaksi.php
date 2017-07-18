<head>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/style.css"/>
  <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->

  <script type="text/javascript">

  </script>
</head>
<body>
  <form action="<?= base_url('transaksi/insert/') ?>" enctype="multipart/form-data" method="post" id="form-transaksi" data-parsley-validate class="form-horizontal form-label-left">
  <?php
 /* $bulan = date('m', strtotime(date('Y-m-d') . '- 1 month '));
   $tgl = date('Y-').$bulan;
   echo $tgl;*/
   ?>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Id Pelanggan <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">

        <!-- <input id="tgl_trans" type="text" name="id_pelanggan" required="required" class="form-control col-md-7 col-xs-12"> -->
        <select id="id_pel" onchange="stand()" name="id_pel" required="required" class="form-control col-md-7 col-xs-12">
        <option value="" selected="">-Pilih Pelanggan-</option>
          <?php foreach($pelanggan as $daftar){ ?>
          <option value="<?php echo $daftar->id_pel; ?>"><?php echo $daftar->id_pel; ?></option>
          <?php } ?>
        </select>
       <!--  <input type="text" name="id_pel" required="required" class="form-control col-md-7 col-xs-12"> -->
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Transaksi<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php #echo form_input('nama'); ?>
        <input type="date" placeholder="yyyy/mm/dd" value="<?php echo date('Y-m-d'); ?>" name="tgl" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">stand_lalu <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php #echo form_input('nama'); ?>
        <input type="text" readonly="" id="stand_lalu" name="stand_lalu" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">stand_kini <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php #echo form_input('nama'); ?>
        <input type="text" name="stand_kini" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>

    <!-- <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Pemakaian per kwh<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php #echo form_input('email'); ?>
        <input type="text" name="pemakaian" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div> -->

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Foto<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">

        <input type="file" name="foto" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keterangan<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <?php #echo form_input('email'); ?>
        <textarea type="text" name="keterangan" required="required" class="form-control col-md-7 col-xs-12"></textarea>
      </div>
    </div>


<div class="form-group">
  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
    <button type="submit" id="submit_" class="btn btn-success">Proses</button>
    <button type="reset" class="btn btn-primary">Reset</button>
    <button onclick="window.history.back()" class="btn btn-danger pull-right">Kembali</button>

  </div>
</div>



</div>
</body>

</form>
<script type="text/javascript">
  function stand(){
    var id_pel = $("#id_pel").val();
    var url = "<?php echo base_url() . 'transaksi/get_stand' ?>";
      $.ajax({
          type: 'POST',
          url: url,
          data: {id_pel:id_pel},
          success: function(msg){
            $('#stand_lalu').val(msg);
          }
      });
  }
</script>
