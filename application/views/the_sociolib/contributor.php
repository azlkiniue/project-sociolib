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
   <script src="<?php echo base_url("assets/js/xepOnline.jqPlugin.js") ?>"></script>
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
    background: linear-gradient(to right, rgba(255, 255, 255, 0.9) 12%,  rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 0.9) 90%), url('<?php echo base_url("assets/img/pattern-1.jpg") ?>');
  }
  </style>
  <script>
  $(document).ready(function(){
    $("#pdf").mouseenter(function(){
      var width;
      width = $(".main-panel").width();
      var height;
      height = $(".main-panel").height();
      if (height<400) {
        height+=500;
      }
      // console.log($(".row").height());
      $("#pdf").attr("onclick", "return xepOnline.Formatter.Format('print',{pageWidth:'"+ width +"px', pageHeight:'"+ height +"px'});");
      // console.log(width);
    });
  });
  </script>
  <body>
    <div class="wrapper">
      <div class="sidebar" id="side" data-color="purple" data-image="<?php echo base_url("assets/img/sidebar-6.jpg") ?>">
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
                  <li class="contributor active">
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
                    <a class="navbar-brand" href="#">Top Kontributor</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <button href="#" id="pdf" class="btn btn-default btn-xs"><i class="fa fa-fw fa-file-pdf-o"></i>Export to PDF</button>
                  </li>
                </ul>
                <div class="collapse navbar-collapse">

                </div>
            </div>
        </nav>
        <div class="content">
          <div id="print" class="container-fluid">
            <div class="card">
              <div class="header">
                <h4 class="title">Congratulation!</h4>
                <p class="category">Selamat kepada yang namanya tertera di bawah ini, terimakasih atas kontribusinya, kalian luar biasa!</p>
              </div>
              <div class="content table-responsive table-full-width">
                <?php $i=1;
                echo '<table class="table table-striped">
                  <thead>';
                echo "<th>#</th>
                  <th>Kontributor</th>
                  <th>Jumlah donasi</th>";
                  echo '</thead><tbody>';
                foreach ($query as $row) {
                  echo "<tr>";
                  echo "<td>".$i."</td>";$i++;
                  echo "<td>".$row->kontributor."</td>";
                  echo "<td>".$row->jumlah."</td>";
                  echo "</tr>";//echo "<td>".anchor("project_sociolib/bayarDenda/{$row->no_transaksi}", "Bayar")."</td>";
                }
                echo "</tbody></table>";
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
