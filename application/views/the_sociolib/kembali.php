<!DOCTYPE html>
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
  <script>
    $(document).ready(function(){
      $('#check').click(function(){
        if ( $('#check').attr('class') == 'checkbox ct-red checked' ) {
            // do this
            document.getElementById("form").action="<?php echo site_url("the_sociolib/postKembali/{$query[0]->no_transaksi}/{$telat}/false");?>"
        } else {
            // do that
            document.getElementById("form").action="<?php $harga = ($query[0]->harga==0) ? 50000 : $query[0]->harga ; echo site_url("the_sociolib/postKembali/{$query[0]->no_transaksi}/{$telat}/{$harga}");?>"
        }
      });
    });
  </script>
  <style media="screen">
    .panel{
      margin-top: 10px;
    }
    .ct-red.checkbox.checked .second-icon, .ct-red.radio.checked .second-icon, .ct-red.checkbox.checked, .ct-red.radio.checked {
    	color: #FF3B30;
    }
    /*#boxes{
      margin-top: 4px;
    }*/
  </style>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-title"><h1>Form Pengembalian Buku</h1></div>
        </div>
        <div class="panel-body">
          <?php
            echo anchor("the_sociolib/dataPeminjaman", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
            $a = array('id' => 'form' );
            echo "<br><br>".form_open("the_sociolib/postKembali/{$query[0]->id}/{$telat}/false", $a);

            echo "<div style='display:none'>";
            $a=array('name' => 'id_buku', 'class' => 'form-control', 'value' => $query[0]->id_buku);
            echo '<label>Nama :</label>'.form_input($a)."<br>";
            $a=array('name' => 'id_anggota', 'class' => 'form-control', 'value' => $query[0]->id_anggota);
            echo '<label>Judul :</label>'.form_input($a)."<br>";
            $a=array('name' => 'nama', 'class' => 'form-control', 'value' => $query[0]->nama);
            echo '<label>Nama :</label>'.form_input($a)."<br>";
            $a=array('name' => 'judul', 'class' => 'form-control', 'value' => $query[0]->judul);
            echo '<label>Judul :</label>'.form_input($a)."<br>";
            $a=array('name' => 'tgl_pinjam', 'class' => 'form-control', 'value' => $query[0]->tgl_pinjam);
            echo '<label>Tanggal Pinjam :</label>'.form_input($a)."<br>";
            echo "</div>";

            $a="<p class='form-control-static'>".$query[0]->nama."</p>";
            echo '<label>Nama :</label>'.$a."<br>";
            $a="<p class='form-control-static'>".$query[0]->judul."</p>";
            echo '<label>Judul :</label>'.$a."<br>";
            $a="<p class='form-control-static'>".$query[0]->tgl_pinjam."</p>";
            echo '<label>Tanggal Pinjam :</label>'.$a."<br>";

            echo '<label>Buku Hilang :  </label> ';
            // echo '<label class="checkbox-inline">
            // <input type="checkbox" id="check" value="" name="harga" onclick="tes();">*) Dicentang ketika buku hilang
            // </label><br><br>';
            echo '<label class="checkbox ct-red" id="check" for="checkbox1">
              <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">
              *) Dicentang ketika buku hilang
            </label><br><br>';
            // var_dump($query[0]->harga);
            echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Kembali</button>';
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
