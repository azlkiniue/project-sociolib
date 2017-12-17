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
  <!-- <script>
    $(document).ready(function(){
      $('.modal').appendTo("body");
    });
  </script> -->
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
    background: linear-gradient(to right, rgba(255, 255, 255, 0.95) 12%,  rgba(255, 255, 255, 0.5) 50%, rgba(255, 255, 255, 0.3) 90%), url('<?php echo base_url("assets/img/pattern-9.jpg") ?>');
  }
  </style>
  <body>
    <div class="wrapper">
      <div class="sidebar" id="side" data-color="red" data-image="<?php echo base_url("assets/img/sidebar-6.jpg") ?>">
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
                  <li>
                    <a href="<?php echo site_url("the_sociolib/dataPeminjaman");?>">
                      <i class="fa fa-fw fa-address-book"></i>
                      <p>Peminjaman</p>
                    </a>
                  </li>
                  <li class="active">
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
                    <a class="navbar-brand" href="#">Daftar Denda</a>
                </div>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>
        <div class="content">
          <div class="container-fluid">
            <div class="card">
              <div class="table-responsive">
                <?php
                echo '<table class="table table-hover table-striped">
                  <thead>';
                echo "<th>#</th>
                  <th>Nama Peminjam</th>
                  <th>Buku yang Dipinjam</th>
                  <th>Jenis Denda</th>
                  <th>Biaya</th>
                  <th class='text-center'>Pembayaran</th>";
                  echo '</thead><tbody>';
                foreach ($query as $row) {
                  $denda = ($row->jenis_denda) ? "Buku Hilang" : "Terlambat" ;
                  echo "<tr>";
                  echo "<td>".$row->no_transaksi."</td>";
                  echo "<td>".$row->nama."</td>";
                  echo "<td>".$row->judul."</td>";
                  echo "<td>".$denda."</td>";
                  echo "<td>".$row->biaya."</td><td class='text-center'>";
                  if($row->bayar<$row->biaya){
                  echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$row->no_transaksi.'">Bayar</button>';}
                  else{
                  echo "<p class='text-success'>Lunas</p>";}
                  echo "</td></tr>";?>
                  <!-- Modal -->
                  <div id="myModal<?php echo $row->no_transaksi; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content card">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body"><?php
                          echo '<form id="modal_form'.$row->no_transaksi.'" action="http://localhost/CodeIgniter-2.2.6/index.php/the_sociolib/postBayarDenda/'.$row->no_transaksi.'" method="post">';
                          $a=array('name' => 'bayar', 'class' => 'form-control');
                          echo '<label>Nominal Pembayaran :</label><br>'.form_input($a)."<br></form>";
                        ?></div>
                        <div class="modal-footer">
                          <button onclick="form_submit(<?php echo $row->no_transaksi; ?>)" class="btn btn-success btn-fill">Bayar</button>
                          <?php //echo anchor("the_sociolib/postBayarDenda/{$row->no_transaksi}", "Bayar", array('class' => 'btn btn-success')); ?>
                          <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        </div>
                      </div></div></div> <?php
                }
                echo "</tbody></table>";
                ?>
                <script type="text/javascript">
                  function form_submit(no) {
                    document.getElementById("modal_form"+no).submit();
                   }
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
