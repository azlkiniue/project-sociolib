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
  <style media="screen">
  .panel{
    margin-top: 10px;
  }
  </style>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-title"><h1>Form Tambah <?php $jenis = ($tipe=='buku') ? 'Buku' : 'Anggota' ; echo $jenis; ?> Baru</h1></div>
        </div>
        <div class="panel-body">
          <?php
            echo anchor("the_sociolib/index/{$tipe}", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
            echo "<br><br>".form_open("the_sociolib/postInsert/{$tipe}");
            if ($tipe=='buku') {
              $a=array('name' => 'judul', 'class' => 'form-control');
              echo '<label>Judul :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'tahun', 'class' => 'form-control');
              echo '<label>Tahun :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'penerbit', 'class' => 'form-control');
              echo '<label>Penerbit :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'penulis', 'class' => 'form-control');
              echo '<label>Penulis :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'harga', 'class' => 'form-control');
              echo '<label>Harga (Rupiah):</label><br>'.form_input($a)."<br>";
            } else {
              $a=array('name' => 'nama', 'class' => 'form-control');
              echo '<label>Nama :</label><br>'.form_input($a)."<br>";

              // echo '<label class="radio-inline"><input type="radio" name="gender1" value="L" echo jenis($row["gender"], "L") > Pria</label>
              // <label class="radio-inline"><input type="radio" name="gender1" value="P" <?php echo jenis($row["gender"], "P") > Wanita</label>';
              $l=array('name' => 'gender', 'value' => 'L', 'data-toggle' => 'radio');
              $p=array('name' => 'gender', 'value' => 'P', 'data-toggle' => 'radio');
              echo '<label>Gender :</label><br>
              <label class="radio">'.form_radio($l).'Laki-laki</label>
              <label class="radio">'.form_radio($p).'Perempuan</label>';

              $a=array('name' => 'tgl_lahir', 'class' => 'form-control', 'placeholder' => 'YYYY/MM/DD');
              echo '<label>Tanggal Lahir :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'alamat', 'class' => 'form-control');
              echo '<label>Alamat :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'pekerjaan', 'class' => 'form-control');
              echo '<label>Pekerjaan :</label><br>'.form_input($a)."<br>";
              $a=array('name' => 'no_hp', 'class' => 'form-control');
              echo '<label>Nomor HP :</label><br>'.form_input($a)."<br>";
            }

            echo '<div class="btn-group">';
            echo '<button class="btn btn-primary btn-fill" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
            echo '<button class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button></div>';
            /* buku   : id, judul, tahun, penerbit, penulis
               anggota: id, nama, gender, alamat, no_hp */
          ?>

        </div>
      </div>
    </div>
  </body>
</html>
