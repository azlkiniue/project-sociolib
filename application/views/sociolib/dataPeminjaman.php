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
   .table > thead > tr > th {
     vertical-align: middle;
   }
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
              <li>
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
              <li class="active">
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
          <h1 class='page-header'>Daftar Peminjaman</h1>
          <div class="table-responsive">
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
                <thead><tr class="table-bordered">';
              echo "<th>#</th>
                <th>Nama Peminjam</th>
                <th>Buku yang Dipinjam</th>
                <th class='text-center'>Tanggal Peminjaman</th>
                <th>Pengembalian</th>";
                echo '</tr></thead>';
              foreach ($query as $row) {
                $testTelat=telat($row->tgl_pinjam);
                echo "<tr class='table-bordered'>";
                echo "<td>".$row->no_transaksi."</td>";
                echo "<td>".$row->nama."</td>";
                echo "<td>".$row->judul."</td>";
                echo "<td class='text-center'>".$row->tgl_pinjam."</td>";
                if($row->tgl_kembali==NULL) echo "<td class='text-center'>".anchor("project_sociolib/kembali/{$row->no_transaksi}/{$testTelat}", "<span class='glyphicon glyphicon-hand-right'></span> Kembali", array('class' => 'btn btn-info'))."</td>";
                else echo "<td class='text-center'>".$row->tgl_kembali."</td>";
                echo "</tr>";
              }
              echo "</table><br>";
              echo anchor("project_sociolib/peminjaman", "<span class='glyphicon glyphicon-plus-sign'></span> Peminjaman Baru", array('class' => 'btn btn-primary'));
              // var_dump($test);echo "<br>".$test."<br>";var_dump($query);
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
