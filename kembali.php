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
</html>
<?php
$a = array('id' => 'form' );
echo "<br>".form_open("project_sociolib/postKembali/{$query[0]->no_transaksi}/{$telat}/false", $a);

echo "<div style='display:none'>";
$a=array('name' => 'id_buku', 'class' => 'form-control', 'value' => $query[0]->id_buku);
echo '<label>Nama :</label><br>'.form_input($a)."<br>";
$a=array('name' => 'id_anggota', 'class' => 'form-control', 'value' => $query[0]->id_anggota);
echo '<label>Judul :</label><br>'.form_input($a)."<br>";
echo "</div>";

$a=array('name' => 'nama', 'class' => 'form-control', 'value' => $query[0]->nama);
echo '<label>Nama :</label><br>'.form_input($a)."<br>";
$a=array('name' => 'judul', 'class' => 'form-control', 'value' => $query[0]->judul);
echo '<label>Judul :</label><br>'.form_input($a)."<br>";
$a=array('name' => 'tgl_pinjam', 'class' => 'form-control', 'value' => $query[0]->tgl_pinjam);
echo '<label>Tanggal Pinjam :</label><br>'.form_input($a)."<br>";
echo '<label>Buku Hilang :</label><br>';
echo '<input type="checkbox" id="check" value="" name="harga" onclick="tes();"><br>';
// var_dump($query[0]->harga);
// echo '<div class="btn-group">';
echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
echo '<button class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button>';
?>
