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
  echo "<br>".form_open("project_sociolib/postEdit/{$tipe}/{$query[0]->id}");
  if ($tipe=='buku') {
    $a=array('name' => 'judul', 'value' => $query[0]->judul, 'class' => 'form-control');
    echo '<label>Judul :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'tahun', 'value' => $query[0]->tahun, 'class' => 'form-control');
    echo '<label>Tahun :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'penerbit', 'value' => $query[0]->penerbit, 'class' => 'form-control');
    echo '<label>Penerbit :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'penulis', 'value' => $query[0]->penulis, 'class' => 'form-control');
    echo '<label>Penulis :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'harga', 'value' => $query[0]->harga, 'class' => 'form-control');
    echo '<label>Harga (Rupiah):</label><br>'.form_input($a)."<br>";
  } else {
    $a=array('name' => 'nama', 'value' => $query[0]->nama, 'class' => 'form-control');
    echo '<label>Nama :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'gender', 'value' => $query[0]->gender, 'class' => 'form-control');
    echo '<label>Gender :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'alamat', 'value' => $query[0]->alamat, 'class' => 'form-control');
    echo '<label>Alamat :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'pekerjaan', 'value' => $query[0]->pekerjaan, 'class' => 'form-control');
    echo '<label>Pekerjaan :</label><br>'.form_input($a)."<br>";
    $a=array('name' => 'no_hp', 'value' => $query[0]->no_hp, 'class' => 'form-control');
    echo '<label>Nomor HP :</label><br>'.form_input($a)."<br>";
  }

  // echo '<div class="btn-group">';
  echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
  echo '<button class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button>';
  /* buku   : id, judul, tahun, penerbit, penulis
     anggota: id, nama, gender, alamat, no_hp */
  echo anchor("project_sociolib/delete/{$tipe}/{$query[0]->id}", "Delete");
?>
