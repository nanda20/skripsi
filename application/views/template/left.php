<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index" class="site_title"><i class="fa fa-desktop"></i> <span>Div. Trans Energi</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile">
      <div class="profile_pic">
        <img src="<?= base_url() ?>assets/images/user.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Selamat Datang,</span>
        <h2>Administrator</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="<?= base_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a><i class="fa fa-edit"></i> User Login <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('login_user/index') ?>">Lihat Data</a></li>
              <li><a href="<?= base_url('login_user/tambahdata') ?>">Tambah Data</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-keyboard-o"></i> Kode Baca <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('kode_baca/index') ?>">Lihat Data</a></li>
              <li><a href="<?= base_url('kode_baca/tambahdata') ?>">Tambah Data</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-user-plus"></i> Pelanggan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('pelanggan/index') ?>">Lihat Data</a></li>
              <li><a href="<?= base_url('pelanggan/tambahdata') ?>">Tambah Data</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-history"></i> Record Pelanggan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('logpelanggan/index') ?>">Lihat Data</a></li>

            </ul>
          </li>

          <li><a><i class="fa fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('transaksi/index') ?>">Lihat Data</a></li>
              <li><a href="<?= base_url('transaksi/tambahdata') ?>">Tambah Data</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <!-- <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div> -->
    <!-- /menu footer buttons -->
  </div>
</div>
