<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/sb-admin.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css") ?>">
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
  </head>
  <style>
   /*.page-header {
     margin-top: 0px;
   }*/
   body { background: white !important; }
  </style>
  <body>
    <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SocioLib <small>Library with Social purpose</small></a>
        </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse" id="navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
              <li class="active">
                  <a href="javascript:;" data-toggle="collapse" data-target="#navdata"><i class="fa fa-fw fa-database"></i> Data <i class="fa fa-fw fa-caret-down"></i></a>
                  <ul id="navdata" class="collapse">
                      <li>
                          <a href="<?php echo site_url("project_sociolib/index/anggota");?>"><i class="fa fa-fw fa-users"></i> Anggota</a>
                      </li>
                      <li>
                          <a href="<?php echo site_url("project_sociolib/index/buku");?>"><i class="fa fa-fw fa-book"></i> Buku</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:;" data-toggle="collapse" data-target="#transaksi"><i class="fa fa-fw fa-exchange"></i> Transaksi <i class="fa fa-fw fa-caret-down"></i></a>
                  <ul id="transaksi" class="collapse">
                      <li>
                          <a href="<?php echo site_url("project_sociolib/dataPeminjaman");?>"><i class="fa fa-fw fa-address-book"></i> Peminjaman</a>
                      </li>
                      <li>
                          <a href="<?php echo site_url("project_sociolib/denda");?>"><i class="fa fa-fw fa-money"></i> Denda</a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="<?php echo site_url("project_sociolib/dataDonasi");?>"><i class="fa fa-fw fa-handshake-o"></i> Donasi</a>
              </li>
              <li>
                  <a href="<?php echo site_url("project_sociolib/contributor");?>"><i class="fa fa-fw fa-trophy"></i> Top Kontributor</a>
              </li>
              <li>
                  <a href="<?php echo site_url("project_sociolib/statistik");?>"><i class="fa fa-fw fa-line-chart"></i> Statistik</a>
              </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
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
                  <th>Nomor HP</th>";
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
                    $gender = ($row->gender=='L') ? 'Laki-laki' : 'Perempuan' ;
                    echo "<td>".$row->id."</td>";
                    echo "<td>".$row->nama."</td>";
                    echo "<td>".$gender."</td>";
                    echo "<td>".$row->alamat."</td>";
                    echo "<td>".$row->no_hp."</td>";
                  } echo "<td>".anchor("project_sociolib/edit/{$str}/{$row->id}", "<span class='glyphicon glyphicon-edit'></span> Edit", array('class' => 'btn btn-info'))."</td></tr>";
                }
                echo "</table><br>";
                echo anchor("project_sociolib/insert/{$str}", "<span class='glyphicon glyphicon-plus-sign'></span> Tambah Data", array('class' => 'btn btn-primary'));
              ?>

          </div>
        </div>
        <!-- Container-Fluid -->
      </div>
      <!-- Page-Wrapper -->
    </div>
    <!-- Wrapper -->
  </body>
</html>
