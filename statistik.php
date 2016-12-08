<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/morris.css") ?>">
  </head>
  <style>
  .page-header {
     margin-top: 10px;
   }
  </style>
  <body class="container">
    <div class="col-sm-3">
      <div name="master" class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Master</div></div>
          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="<?php echo site_url("project_sociolib/index/anggota");?>">Anggota</a></li>
              <li><a href="<?php echo site_url("project_sociolib/index/buku");?>">Buku</a></li>
              <li><a href="<?php echo site_url("project_sociolib/index/anggota");?>">Administrator</a></li>
            </ul>
          </div>
      </div>
      <div name="transaksi" class="panel panel-default">
        <div class="panel-heading"><div class="panel-title">Transaksi</div></div>
          <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="<?php echo site_url("project_sociolib/dataPeminjaman");?>">Peminjaman</a></li>
              <li><a href="<?php echo site_url("project_sociolib/denda");?>">Denda</a></li>
            </ul>
          </div>
      </div>
      <div name="donasi" class="panel panel-default">
        <div class="panel-heading"><a href="<?php echo site_url("project_sociolib/dataDonasi");?>" class="panel-title">Donasi</a></div>
          <!-- <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="">Donasi</a></li>
            </ul>
          </div> -->
      </div>
      <div name="statistik" class="panel panel-default">
        <div class="panel-heading"><a href="<?php echo site_url("project_sociolib/statistik");?>" class="panel-title">Statistik</a></div>
          <!-- <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
              <li><a href=""></a></li>
            </ul>
          </div> -->
      </div>
    </div>
    <div class="col-sm-9 panel panel-default">
      <div class="panel body">
        <h1 class='page-header'>Statistik</h1>
        <div id="morris-bar-chart" ></div>
        <div id="morris-donut-chart" ></div>
        <div id="morris-line-chart" ></div>
        <div id="morris-area-chart" ></div>
      </div>
    </div>

    <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/morris.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/raphael.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/morris-data.js") ?>"></script>
  </body>
</html>
