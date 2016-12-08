<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
  </head>
  <style>
  .page-header {
     margin-top: 0px;
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
    <div class="col-sm-9 panel panel-default panel-body">
      <h1 class='page-header'>Data Donasi</h1>
      <div class="table-responsive">
        <?php
          $str=substr(uri_string(), 23);
          echo '<table class="table table-striped">
            <thead><tr class="table-bordered">';
          echo "<th>#</th>
            <th>Nama Donatur</th>
            <th>Buku yang Didonasikan</th>
            <th>Tanggal Donasi</th>";
            echo '</tr></thead>';
          foreach ($query as $row) {
            echo "<tr class='table-bordered'>";
            echo "<td>".$row->no_transaksi."</td>";
            echo "<td>".$row->nama."</td>";
            echo "<td>".$row->judul."</td>";
            echo "<td>".$row->tgl_donasi."</td>";
            // echo "<td>".anchor("project_sociolib/edit/{$str}/{$row->id}", "Edit")."</td>
            echo "</tr>";
          }
          echo "</table><br>";
          echo anchor("project_sociolib/donasi", "<span class='glyphicon glyphicon-plus-sign'></span> Donasi Baru", array('class' => 'btn btn-primary'));
          // var_dump($test);echo "<br>".$test."<br>";var_dump($query);
        ?>
      </div>
    </div>
  </body>
</html>
