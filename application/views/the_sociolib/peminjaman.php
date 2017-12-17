<html>
  <head>
   <title>Database</title>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery1.11.4-ui.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/light-bootstrap-dashboard.css") ?>">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.min.css") ?>">
   <!-- <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css") ?>"> -->
   <!-- <link rel="stylesheet" href="<?php echo base_url("assets/css/pe-icon-7-stroke.css") ?>"> -->
   <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
   <script src="<?php echo base_url("assets/js/light-bootstrap-dashboard.js") ?>"></script>
   <!-- <script src="<?php echo base_url("assets/js/bootstrap-checkbox-radio-switch.js") ?>"></script> -->
   <!-- <script src="<?php echo base_url("assets/js/bootstrap-notify.js") ?>"></script> -->
  </head>
  <style media="screen">
  .panel{
    margin-top: 10px;
  }
  </style>
  <script>
    $( function() {
     $(document).ready(function(){
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
       $.getJSON( "http://localhost/CodeIgniter-2.2.6/index.php/web/index/data_buku", function( obj ) {
         function split( val ) {
           return val.split( /,\s*/ );
         }
         function extractLast( term ) {
           return split( term ).pop();
         }
         function log( id ) {
           $( "#id_buku" ).text( id );
           $( "input[name='id_buku']" ).val(id);
         }

         $( "input[name='buku']" )
           .on( "keydown", function( event ) {
             if ( event.keyCode === $.ui.keyCode.TAB &&
                 $( this ).autocomplete( "instance" ).menu.active ) {
               event.preventDefault();
             }
           })
           .autocomplete({
             minLength: 0,
             source: function( request, response ) {
               // delegate back to autocomplete, but extract the last term
               response( $.ui.autocomplete.filter(
                 obj, extractLast( request.term ) ) );
             },
             focus: function() {
               // prevent value inserted on focus
               return false;
             },
             select: function( event, ui ) {
              var terms = [];
              $.each(split( this.value ), function(i, el){
                  if($.inArray(el, terms) === -1) terms.push(el);
              });
               // remove the current input
               terms.pop();
               // add the selected item
               terms.push( ui.item.value );
               // add placeholder to get the comma-and-space at the end
               terms.push( "" );
               this.value = terms.join( ", " );

               var id = [];
               $.each(split($( "#id_buku" ).text()), function(i, el){
                   if($.inArray(el, id) === -1) id.push(el);
               });
               id.pop();
               id.push( ui.item.id );
               id.push( "" );
               log( id.join( ", " ) );
               return false;
             }
           });
       });
     });
    });
 </script>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="panel-title"><h1>Form Peminjaman</h1></div>
        </div>
        <div class="panel-body">
          <?php
            echo anchor("the_sociolib/dataPeminjaman", "<span class='glyphicon glyphicon-hand-left'></span> Kembali", array('class' => 'btn btn-default'));
            echo "<br><br>".form_open("the_sociolib/postPinjam");

            echo "<div style='display:none'>";
            $a=array('name' => 'id_buku', 'class' => 'form-control');
            echo '<label>Nama :</label>'.form_input($a)."<br>";
            $a=array('name' => 'id_anggota', 'class' => 'form-control');
            echo '<label>Judul :</label>'.form_input($a)."<br>";
            echo "</div>";

            $a=array('name' => 'anggota', 'class' => 'form-control');
            echo '<label>Peminjam :</label><br>';
            echo "<div class='form-group input-group'><span id='id_anggota' class='input-group-addon'></span>".form_input($a)."</div>";

            $a=array('name' => 'buku', 'class' => 'form-control');
            echo '<label>Buku :</label><br>';
            echo "<div class='form-group input-group'><span id='id_buku' class='input-group-addon'></span>".form_input($a)."</div>";

            echo '<div class="btn-group">';
            echo '<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Pinjam</button>';
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
