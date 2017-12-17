<html>
  <head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/datepicker.css") ?>">
    <!--<link rel=stylesheet href="<?php echo base_url("assets/js/jquery1.11.4-ui.css") ?>">-->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery-1.11.3.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap-datepicker.js") ?>"></script>
  </head>
  <body class="panel panel-info container">
    <h1 class="panel-heading">Form Edit Data</h1>

      <?php
      function ref($class, $str)
      {
        if($str==$class)
        return 'selected';
      }
      //print_r(array_values($query));
      echo anchor("dbase/index/{$query[0]->kelas}", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
      echo "<br>".form_open("dbase/postEdit/{$query[0]->nrp}", array('class' => 'panel-body' ));
      $nrp=array('name' => 'nrp', 'value' => $query[0]->nrp, 'class' => 'form-control');
      echo '<label>NRP :</label><br>'.form_input($nrp).'<br>';
      $nama=array('name' => 'nama', 'value' => $query[0]->nama, 'class' => 'form-control');
      echo '<label>Nama :</label><br>'.form_input($nama).'<br>';
      $alamat=array('name' => 'alamat', 'value' => $query[0]->alamat, 'class' => 'form-control');
      echo '<label>Alamat :</label><br>'.form_input($alamat).'<br>';
      ?>
      <label>Kelas :</label><br>
      <select name="kelas" class="form-control">
        <option value="D3_IT_A" <?php echo ref("D3_IT_A", $query[0]->kelas);?> >D3 A</option>
        <option value="D3_IT_B" <?php echo ref("D3_IT_B", $query[0]->kelas);?> >D3 B</option>
        <option value="D4_IT_A" <?php echo ref("D4_IT_A", $query[0]->kelas);?> >D4 A</option>
        <option value="D4_IT_B" <?php echo ref("D4_IT_B", $query[0]->kelas);?> >D4 B</option>
      </select><br><br>
      <?php
      echo '<div class="btn-group">';
      echo '<button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Save Data</button>';
      /*echo form_submit('mysubmit','Ok');
      echo form_reset('mysubmit','Clear');*/
      echo anchor("dbase/delete/{$query[0]->nrp}", "Delete Data <span class='glyphicon glyphicon-trash'></span>", array('class' => 'btn btn-danger'));
      ?>
    </div>
  </body>
</html>
