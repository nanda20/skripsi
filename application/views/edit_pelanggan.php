
        <form action="<?= base_url('pelanggan/update/') ?>" method="post" id="form-pegawai" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nomer Meter <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('id_pelanggan'); ?>
                    <input type="text" name="id_pel" id="id_pel" value="<?php echo $pelanggan[0]->id_pel ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('id_pelanggan'); ?>
                    <input type="text" name="nama" value="<?php echo $pelanggan[0]->nama ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Alamat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('alamat'); ?>
                    <textarea type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12"><?php echo $pelanggan[0]->alamat ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nomor Tiang <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php #echo form_input('no_telp'); ?>
                    <input type="text" name="no_tiang" required="required" value="<?php echo $pelanggan[0]->no_tiang ?>" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lat <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('email'); ?>
                <input type="text" name="lat" required="required" value="<?php echo $pelanggan[0]->lat ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lon <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('password',$pegawai[0]->password); ?>
                <input type="text" name="long" required="required" value="<?php echo $pelanggan[0]->long ?>" class="form-control col-md-7 col-xs-12">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Baca <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php #echo form_input('password',$pegawai[0]->password); ?>
                <input type="text" name="kode_baca" required="required" value="<?php echo $pelanggan[0]->kode_baca ?>" class="form-control col-md-7 col-xs-12">
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
