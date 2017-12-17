<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/light-bootstrap-dashboard.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery1.11.4-ui.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css") ?>">
   <!-- <link rel="stylesheet" href="<?php echo base_url("assets/css/pe-icon-7-stroke.css") ?>"> -->
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
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
  <script>
    $.getJSON( "http://localhost/CodeIgniter-2.2.6/index.php/web/index/data_anggota", function( obj ) {
      function log( id ) {
         $( "#id_anggota" ).text( id );
         $( "input[name='id_anggota']" ).val(id);
       }

       $( "input[name='anggota']" ).autocomplete({
         source: obj,
         //minLength: 2,
         select: function( event, ui ) {
           log( ui.item.id );
         }
       });
    });
  </script>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-title"><h1>Form Donasi</h1></div>
        </div>
        <div class="panel-body">
          <?php
            echo anchor("the_sociolib/dataDonasi", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
            echo "<br><br>".form_open("the_sociolib/submitDonasi");

            echo "<div style='display:none'>";
            $a=array('name' => 'id_anggota', 'class' => 'form-control');
            echo '<label>Judul :</label>'.form_input($a)."<br>";
            echo "</div>";

            $a=array('name' => 'judul', 'class' => 'form-control');
            echo '<label>Judul :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'tahun', 'class' => 'form-control');
            echo '<label>Tahun :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'penerbit', 'class' => 'form-control');
            echo '<label>Penerbit :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'penulis', 'class' => 'form-control');
            echo '<label>Penulis :</label><br>'.form_input($a)."<br>";
            $a=array('name' => 'anggota', 'class' => 'form-control');
            echo '<label>Donatur :</label><br>';
            echo "<div class='form-group input-group'><span id='id_anggota' class='input-group-addon'></span>".form_input($a)."</div>";
            // $a=array('name' => 'id_anggota', 'class' => 'form-control');
            // echo '<label>Nomor Anggota Donatur:</label><br>'.form_input($a)."<br>";

            echo '<div class="btn-group">';
            echo '<button class="btn btn-primary btn-fill" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>';
            echo '<button onclick="clickReset()" class="btn btn-primary" type="reset">Reset <span class="glyphicon glyphicon-record"></span></button></div>';
          ?>
          <script type="text/javascript">
            function clickReset() {
              $( "#id_anggota" ).text("");
              $( "#id_buku" ).text("");
            }
          </script>
        </div>
      </div>
    </div>
  </body>
</html>
