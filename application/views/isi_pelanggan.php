

        <form action="<?= base_url('pelanggan/insert/') ?>" method="post" id="form-pegawai" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Meter <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('id_pelanggan'); ?>
                    <input type="text" name="id_pel" id="id_pel" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('id_pelanggan'); ?>
                    <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Alamat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('alamat'); ?>
                    <textarea type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nomor Tiang <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('no_telp'); ?>
                    <input type="text" name="no_tiang" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('email'); ?>
                <input type="text" name="lat" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lon <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('password',$pegawai[0]->password); ?>
                <input type="text" name="long" required="required" class="form-control col-md-7 col-xs-12">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Baca <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <!-- <?php #echo form_input('password',$pegawai[0]->password); ?>
                <input type="text" name="kode_baca" required="required" class="form-control col-md-7 col-xs-12"> -->
                <select id="kode_baca" name="kode_baca" class="form-control col-md-7 col-xs-12">
                <option value="" selected="">-Pilih Kode Baca-</option>
                <?php
                  $rr = $this->db->query("SELECT pel.id_pel, pel.nama, pel.alamat, pel.no_tiang, pel.lat, pel.long, kb.kode_baca FROM pelanggan AS pel
                  JOIN kode_baca AS kb ON pel.kode_baca = kb.kode_baca");
                ?>
                  <?php foreach($rr->result() as $d){ ?>
                  <option value="<?php echo $d->kode_baca; ?>"><?php echo $d->kode_baca; ?></option>
                  <?php } ?>
                </select>
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
</form>
