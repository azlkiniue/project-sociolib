<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/light-bootstrap-dashboard.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css") ?>">
   <!-- <link rel="stylesheet" href="<?php echo base_url("assets/css/pe-icon-7-stroke.css") ?>"> -->
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/light-bootstrap-dashboard.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap-checkbox-radio-switch.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap-notify.js") ?>"></script>
  </head>
  <style>
  .navbar-collapse [class^="fa"] {
    float: left;
    font-size: 20px;
    margin-right: 10px;
  }
  .sidebar .nav > li.contributor {
    position: absolute;
    width: 100%;
    bottom: 10px;
  }
  .navbar.navbar-default{
    background: linear-gradient(to right, rgba(255, 255, 255, 0.9) 12%,  rgba(255, 255, 255, 0.5) 50%, rgba(255, 255, 255, 0) 90%), url('<?php echo base_url("assets/img/pattern-4.png") ?>');
  }
  </style>
  <body>
    <div class="wrapper">
      <div class="sidebar" id="side" data-color="orange" data-image="<?php echo base_url("assets/img/sidebar-6.jpg") ?>">
        <!--

          Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
          Tip 2: you can also add an image using data-image tag

        -->
      	<div class="sidebar-wrapper">
              <div class="logo">
                  <a href="" class="simple-text">
                      Social Library
                  </a>
              </div>
              <ul class="nav">
                  <li>
                    <a href="<?php echo site_url("the_sociolib/index/anggota");?>">
                      <i class="fa fa-fw fa-users"></i>
                      <p>Anggota</p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url("the_sociolib/index/buku");?>">
                      <i class="fa fa-fw fa-book"></i>
                      <p>Buku</p>
                    </a>
                  </li>
                  <li class="active">
                    <a href="<?php echo site_url("the_sociolib/dataPeminjaman");?>">
                      <i class="fa fa-fw fa-address-book"></i>
                      <p>Peminjaman</p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url("the_sociolib/denda");?>">
                      <i class="fa fa-fw fa-money"></i>
                      <p>Denda</p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url("the_sociolib/dataDonasi");?>">
                      <i class="fa fa-fw fa-handshake-o"></i>
                      <p>Donasi</p>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url("the_sociolib/statistik");?>"><i class="fa fa-fw fa-line-chart"></i>
                      <p>Statistik</p>
                    </a>
                  </li>
                  <li class="contributor">
                    <a href="<?php echo site_url("the_sociolib/contributor");?>">
                      <i class="fa fa-fw fa-trophy"></i>
                      <p>Top Kontributor</p>
                    </a>
                  </li>
              </ul>
      	</div>
      </div>

      <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=""><!--#navigation-example-2-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Daftar Peminjaman</a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>
        <div class="content">
          <div class="container-fluid">
            <div class="card">
              <div class="header">
                <p class="title">
                  <?php echo anchor("the_sociolib/peminjaman", "<span class='glyphicon glyphicon-plus-sign'></span> Peminjaman Baru", array('class' => 'btn btn-primary')); ?>
                </p>
              </div>
              <div class="content table-responsive table-full-width">
                <?php
                  function telat($tgl)
                  {
                    $tgl_pinjam=date_create($tgl);
                    $tgl_kembali=date_create(date("Y-m-d"));
                    $days=date_diff($tgl_pinjam, $tgl_kembali)->format("%a");
                    if ($days>14) {
                      return $days-14;
                    } else {
                      return "false";
                    } //menampilkan jumlah hari terlambat
                    // var_dump($test);
                    // return date_diff($tgl_pinjam, $tgl_kembali);
                  }
                  // $str=substr(uri_string(), 23);
                  echo '<table class="table table-striped">
                    <thead>';
                  echo "<th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Buku yang Dipinjam</th>
                    <th class='text-center'>Tanggal Peminjaman</th>
                    <th class='text-center'>Pengembalian</th>";
                    echo '</thead><tbody>';
                  foreach ($query as $row) {
                    $testTelat=telat($row->tgl_pinjam);
                    echo "<tr>";
                    echo "<td>".$row->id."</td>";
                    echo "<td>".$row->nama."</td>";
                    echo "<td>".$row->judul."</td>";
                    echo "<td class='text-center'>".$row->tgl_pinjam."</td>";
                    if($row->tgl_kembali==NULL) echo "<td class='text-center'>".anchor("the_sociolib/kembali/{$row->id}/{$testTelat}", "<span class='glyphicon glyphicon-hand-right'></span> Kembali", array('class' => 'btn btn-info'))."</td>";
                    else echo "<td class='text-center'>".$row->tgl_kembali."</td>";
                    echo "</tr>";
                  }
                  echo "</tbody></table><br>";
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
