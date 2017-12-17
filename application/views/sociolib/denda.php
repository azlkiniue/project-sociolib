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
          <h1 class='page-header'>Daftar Denda</h1>
          <div class="table-responsive">
            <?php
            echo '<table class="table table-striped">
              <thead><tr class="table-bordered">';
            echo "<th>#</th>
              <th>Nama Peminjam</th>
              <th>Buku yang Dipinjam</th>
              <th>Jenis Denda</th>
              <th>Biaya</th>
              <th>Pembayaran</th>";
              echo '</tr></thead>';
            foreach ($query as $row) {
              $denda = ($row->jenis_denda) ? "Buku Hilang" : "Terlambat" ;
              echo "<tr class='table-bordered'>";
              echo "<td>".$row->no_transaksi."</td>";
              echo "<td>".$row->nama."</td>";
              echo "<td>".$row->judul."</td>";
              echo "<td>".$denda."</td>";
              echo "<td>".$row->biaya."</td>";
              echo "<td>".$row->bayar."</td>";
              if($row->bayar<$row->biaya){
              echo '<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$row->no_transaksi.'">Bayar</button></td>';}
              echo "</tr>";//echo "<td>".anchor("project_sociolib/bayarDenda/{$row->no_transaksi}", "Bayar")."</td>";?>
              <!-- Modal -->
              <div id="myModal<?php echo $row->no_transaksi; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body"><?php
                      echo '<form id="modal_form'.$row->no_transaksi.'" action="http://localhost/CodeIgniter-2.2.6/index.php/project_sociolib/postBayarDenda/'.$row->no_transaksi.'" method="post">';
                      $a=array('name' => 'bayar', 'class' => 'form-control');
                      echo '<label>Nominal Pembayaran :</label><br>'.form_input($a)."<br></form>";
                    ?></div>
                    <div class="modal-footer">
                      <button onclick="form_submit(<?php echo $row->no_transaksi; ?>)" class="btn btn-success">Bayar</button>
                      <?php //echo anchor("project_sociolib/postBayarDenda/{$row->no_transaksi}", "Bayar", array('class' => 'btn btn-success')); ?>
                      <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                    </div>
                  </div></div></div> <?php
            }
            echo "</table>";
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
  </body>
</html>
