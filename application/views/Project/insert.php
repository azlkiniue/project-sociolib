<html>
  <head>
    <title>Insert Data</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/datepicker.css") ?>">
    <!--<link rel=stylesheet href="<?php echo base_url("assets/js/jquery1.11.4-ui.css") ?>">-->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery-1.11.3.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap-datepicker.js") ?>"></script>
  </head>
  <body class="panel panel-primary container">
    <h1 class="panel-heading">Form Insert Data</h1>

      <?php
      function ref($class)
      {
        $str=ltrim(uri_string(), "dbase/index/");
        if($str==$class)
        return 'selected';
      }
      echo anchor("dbase", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
      echo "<br>".form_open('dbase/postInsert', array('class' => 'panel-body' ));
      $a=array('name' => 'nrp', 'class' => 'form-control');
      echo '<label>NRP :</label><br>'.form_input($a)."<br>";
      $a=array('name' => 'nama', 'class' => 'form-control');
      echo '<label>Nama :</label><br>'.form_input($a)."<br>";
      $a=array('name' => 'alamat', 'class' => 'form-control');
      echo '<label>Alamat :</label><br>'.form_input($a)."<br>";
      ?>
      <label>Kelas :</label><br>
      <select name="kelas" class="form-control">
        <option value="D3_IT_A" <?php echo ref("D3_IT_A");?> >D3 A</option>
        <option value="D3_IT_B" <?php echo ref("D3_IT_B");?> >D3 B</option>
        <option value="D4_IT_A" <?php echo ref("D4_IT_A");?> >D4 A</option>
        <option value="D4_IT_B" <?php echo ref("D4_IT_B");?> >D4 B</option>
      </select><br><br>
      <?php
      echo '<div class="btn-group">';
      echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
      echo '<button class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button>';
      ?>
    </div>
  </body>
</html>
