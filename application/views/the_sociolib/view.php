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
      background: linear-gradient(to right, rgba(255, 255, 255, 0.9) 12%,  rgba(255, 255, 255, 0.5) 50%, rgba(255, 255, 255, 0) 90%), url('<?php echo base_url("assets/img/pattern-3.jpg") ?>');
    }
  </style>
  <body>
    <div class="wrapper">
      <div class="sidebar" id="side" data-color="blue" data-image="<?php echo base_url("assets/img/sidebar-6.jpg") ?>">
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
              <?php $str=substr(uri_string(), 19); ?>
              <ul class="nav">
                  <li <?php if($str=="anggota") echo 'class="active"'; ?>>
                    <a href="<?php echo site_url("the_sociolib/index/anggota");?>">
                      <i class="fa fa-fw fa-users"></i>
                      <p>Anggota</p>
                    </a>
                  </li>
                  <li <?php if($str=="buku") echo 'class="active"'; ?>>
                    <a href="<?php echo site_url("the_sociolib/index/buku");?>">
                      <i class="fa fa-fw fa-book"></i>
                      <p>Buku</p>
                    </a>
                  </li>
                  <li>
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
                    <a class="navbar-brand" href="#">
                      <?php
                      if($str=='buku'){
                        echo "Data Buku";
                      }else {
                        echo "Data Anggota";
                      } ?>
                    </a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="header">
                      <!-- <h4 class="title">Striped Table with Hover</h4> -->
                      <p class="title">
                        <?php echo anchor("the_sociolib/insert/{$str}", "<span class='glyphicon glyphicon-plus-sign'></span> Tambah Data", array('class' => 'btn btn-primary')); ?>
                      </p>
                  </div>
                  <div class="content table-responsive table-full-width">
                    <?php
                      function status($status)
                      {
                        if ($status==1) {
                          echo "<span class='label label-warning'>Dipinjam</span>";
                        }
                      }
                        echo '<table class="table table-hover table-striped">
                          <thead>';
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
                          echo '</thead><tbody>';
                        foreach ($query as $row) {
                          echo "<tr>";
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
                          } echo "<td>".anchor("the_sociolib/edit/{$str}/{$row->id}", "<span class='glyphicon glyphicon-edit'></span> Edit", array('class' => 'btn btn-info'))."</td></tr>";
                        }
                        echo "</tbody></table><br>";

                      ?>

                  </div>
                </div>
              </div>
            </div>
            <!-- contetn -->
          </div>
          <!-- Container-Fluid -->
        </div>

      </div>
      <!-- main panel -->
    </div>
    <!-- Wrapper -->
  </body>
</html>
