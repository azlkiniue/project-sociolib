<!DOCTYPE html>
<html>
  <head>
    <title>Database</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
  </head>
  <script>
    function tes()
    {
      check=document.getElementById("check").checked;
      // form=document.getElementById("form").action;
      if(check==true){
        document.getElementById("form").action="<?php echo site_url("project_sociolib/postKembali/{$query[0]->no_transaksi}/{$telat}/{$query[0]->harga}");?>"
      } else {
        document.getElementById("form").action="<?php echo site_url("project_sociolib/postKembali/{$query[0]->no_transaksi}/{$telat}/false");?>"
        // "<?php $hilang='false'; ?>"
      }
    }
  </script>
  <style media="screen">
  .panel{
    margin-top: 10px;
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
            echo anchor("project_sociolib/dataPeminjaman", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
            $a = array('id' => 'form' );
            echo "<br><br>".form_open("project_sociolib/postKembali/{$query[0]->no_transaksi}/{$telat}/false", $a);

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
            echo '<label class="checkbox-inline">
            <input type="checkbox" id="check" value="" name="harga" onclick="tes();">*) Dicentang ketika buku hilang
            </label><br><br>';
            // var_dump($query[0]->harga);
            echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Kembali</button>';
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
