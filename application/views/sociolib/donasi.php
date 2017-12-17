<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
  </head>
  <style media="screen">
  .panel{
    margin-top: 10px;
  }
  </style>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-title"><h1>Form Donasi</h1></div>
        </div>
        <div class="panel-body">
          <?php
            echo anchor("project_sociolib/dataDonasi", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
            echo "<br><br>".form_open("project_sociolib/submitDonasi");
            $a=array('name' => 'judul', 'class' => 'form-control');
            echo '<label>Judul :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'tahun', 'class' => 'form-control');
            echo '<label>Tahun :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'penerbit', 'class' => 'form-control');
            echo '<label>Penerbit :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'penulis', 'class' => 'form-control');
            echo '<label>Penulis :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'id_anggota', 'class' => 'form-control');
            echo '<label>Nomor Anggota Donatur:</label><br>'.form_input($a)."<br>";

            echo '<div class="btn-group">';
            echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
            echo '<button class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button></div>';
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
