

        <form action="<?= base_url('datatraining/processexcel/') ?>" method="post" id="form-login" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
           

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File Data Excel <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                    <div style="position:relative;">
        <a class='btn btn-primary' href='javascript:;'>
            Choose File...
            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="fileImport" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
        </a>
        &nbsp;
        <span class='label label-info' id="upload-file-info"></span>
</div>
            </div>
        </div>


<div class="form-group">

    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" id="submit_" class="btn btn-success">Proses</button>
      <!-- <button onclick="window.history.back()" class="btn btn-danger pull-right">Kembali</button> -->
      <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
      
  </div>
</div>
 
</div>
</form>
