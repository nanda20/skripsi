<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index" class="site_title"><i class="fa fa-desktop"></i> <span>Sentimen</span></a>
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
          <li><a href="<?= base_url('Home/index')?>"><i class="fa fa-home"></i> Home</a></li>

        <!-- <li><a href="<?= base_url('onlinecrawling/tambahdatacrawling') ?>"> <i class="fa fa-home"></i> Online Crawling</a>
        </li> -->
        
          <li><a><i class="fa fa-edit"></i> Data Training <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('DataTraining/viewTraining') ?>">Data Training</a></li>
              </li>
              <li><a href="<?= base_url('DataTraining/viewStemming') ?>">Data Stemming  <?php 
              if(isset($_SESSION['getStemm'])==1) {echo "<span class='badge'>".$_SESSION['getStemm'].' new </span>'; } ?></a></li>
              </li>
              <li><a href="<?= base_url('DataTraining/viewDataFeature') ?>">Data Features</a></li>
              <!-- <li><a href="<?= base_url('chisquare/viewcorpus') ?>">Data Corpus</a></li> -->
              <li><a href="<?= base_url('DataTraining/viewAddExcel') ?>">Import Data excel</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-edit"></i> Chi Square <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('ChiSquare/viewCorpus') ?>">Lihat Data</a></li>
              <!-- <li><a href="<?= base_url('chisquare/processchisquare') ?>">Hitung Chi Square</a></li> -->
            </ul>
          </li>
          <li><a><i class="fa fa-user-plus"></i> Naive Bayes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('NaiveBayes/viewNaiveBayes') ?>">Lihat Data</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-history"></i> Data Uji <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            
            <li><a href="<?= base_url('NaiveBayes/viewAddExcel') ?>">import</a></li>
              <li><a href="<?= base_url('NaiveBayes/viewTesting') ?>">view Klasifikasi Naive Bayes</a></li>
              <li><a href="<?= base_url('NaiveBayes/viewCompare') ?>">view Perbandingan</a></li>

            </ul>
          </li>

          <!-- <li><a><i class="fa fa-shopping-cart"></i> Grafik <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('transaksi/index') ?>">Lihat Grafik</a></li>
            </ul>
          </li> -->
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
