<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
  </head>
  <body>

  </body>
</html>
<?php
  echo "<br>".form_open("project_sociolib/postPinjam");
  $a=array('name' => 'id_anggota', 'class' => 'form-control');
  echo '<label>Nomor Anggota :</label><br>'.form_input($a)."<br>";
  $a=array('name' => 'id_buku', 'class' => 'form-control');
  echo '<label>Kode Buku :</label><br>'.form_input($a)."<br>";

  // echo '<div class="btn-group">';
  echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
  echo '<button class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button>';
?>
