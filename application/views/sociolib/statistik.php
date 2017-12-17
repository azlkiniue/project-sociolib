<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/morris.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/sb-admin.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css") ?>">
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/morris.min.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/raphael.min.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/morris-data.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/xepOnline.jqPlugin.js") ?>"></script>
  </head>
  <script>
  $(document).ready(function(){
    $("#pdf").mouseenter(function(){
      var width;
      width = $("#wrapper").width();
      $("#pdf").attr("onclick", "return xepOnline.Formatter.Format('print',{pageWidth:'"+ width +"px', pageHeight:'150mm'});");
      // console.log(width);
    });
  })
  </script>
  <style>
    /*.no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .loading{display:none;}
    .se-pre-con {
      position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -#px (where # is half the width of the image);
    margin-top: -#px (where # is half the width of the image);
      z-index: 999999;
      background: url(http://localhost/img/loader-64x/Preloader_3.gif) center no-repeat #fff;
    }*/
    body { background: white !important; }
    .page-header {
      margin-top: 10px;
    }
    .navbar-default{
      text-align:center;
    }
    .navbar-center{
      display: inline-block;
      float: none;
    }
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
              <li class="active">
                  <a href="<?php echo site_url("project_sociolib/statistik");?>"><i class="fa fa-fw fa-line-chart"></i> Statistik</a>
              </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
        <div class="container-fluid">
          <!-- <img src="http://localhost/img/loader-64x/Preloader_3.gif" class="loading">
          <div class="se-pre-con"></div> -->
          <div class="panel body">
            <h1 class='page-header'>Statistik</h1>
            <a href="#" id="pdf" class="btn btn-default" >Export to PDF</a><br><br>
            <div id="print">
              <div class="panel panel-default">
                <div class="panel-heading"><div class="panel-title">Data Anggota Berdasarkan Gender</div></div>
                <div class="panel-body">
                  <div id="morris-donut-chart" ></div>
                  <div id="legend" class="donut-legend text-center"></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"><div class="panel-title">Data Peminjaman</div></div>
                <div class="panel-body">
                <div id="morris-line-chart" ></div>
              </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"><div class="panel-title">Data Persebaran Umur Anggota</div></div>
                <div class="panel-body">
                  <div id="morris-bar-chart" ></div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading"><div class="panel-title">Data Pertumbuhan Jumlah Anggota</div></div>
                <div class="panel-body">
                <div id="morris-area-chart" ></div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
