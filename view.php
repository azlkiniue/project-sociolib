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
    <div class="col-sm-9 panel panel-default">
      <div class="panel-body">
      <div class="table-responsive">
      <?php
      function status($status)
      {
        if ($status==1) {
          echo "<span class='label label-warning'>Dipinjam</span>";
        }
      }
        $str=substr(uri_string(), 23);
        if($str=='buku'){
          echo "<h1 class='page-header'>Data Buku</h1>";
        }else {
          echo "<h1 class='page-header'>Data Anggota</h1>";
        }
        echo '<table class="table table-striped">
          <thead><tr class="table-bordered">';
        if($str=='buku'){
          echo "<th>#</th>
          <th>Judul</th>
          <th>Tahun</th>
          <th>Penerbit</th>
          <th>Penulis</th>";
        }else {
          echo "<th>#</th>
          <th>Nama</th>
          <th>Gender</th>
          <th>Alamat</th>
          <th class='text-center'>Nomor HP</th>";
        }
          echo '</tr></thead>';
        foreach ($query as $row) {
          echo "<tr class='table-bordered'>";
          if($str=='buku'){
            echo "<td>".$row->id."</td>";
            echo "<td>".$row->judul." ";
            echo status($row->status);
            echo "</td>";
            echo "<td>".$row->tahun."</td>";
            echo "<td>".$row->penerbit."</td>";
            echo "<td>".$row->penulis."</td>";
          }else{
            echo "<td>".$row->id."</td>";
            echo "<td>".$row->nama."</td>";
            echo "<td>".$row->gender."</td>";
            echo "<td>".$row->alamat."</td>";
            echo "<td>".$row->no_hp."</td>";
          } echo "<td>".anchor("project_sociolib/edit/{$str}/{$row->id}", "Edit")."</td></tr>";
        }
        echo "</table><br>";
        echo anchor("project_sociolib/insert/{$str}", "<span class='glyphicon glyphicon-plus-sign'></span> Tambah Data", array('class' => 'btn btn-primary'));
      ?>
      </div>
      </div>
    </div>
  </body>
</html>
