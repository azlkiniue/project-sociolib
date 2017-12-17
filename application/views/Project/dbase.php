<!DOCTYPE html>
<html>
 <head>
  <title>Database</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
  <script src="<?php echo base_url("assets/js/jquery-1.12.4.js") ?>"></script>
  <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
 </head>
 <script>
 <?php
  function ref($class)
  {
    $str=ltrim(uri_string(), "dbase/index/");
    if($str==$class)
    return 'selected';
  }
  ?>
  function ref(kelas) {
    window.location.assign('<?php echo site_url("dbase/index");?>'+ kelas);
  }
 </script>
 <body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="text-center">Data Mahasiswa <small>Kelas <?php echo str_replace("_", " ", ltrim(uri_string(), "dbase/index/")); ?></small></h1>
    </div>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pilih Kelas
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><?php echo anchor("dbase/index/D3_IT_A","D3 IT A");?></li>
          <li><?php echo anchor("dbase/index/D3_IT_B","D3 IT B");?></li>
          <li><?php echo anchor("dbase/index/D4_IT_A","D4 IT A");?></li>
          <li><?php echo anchor("dbase/index/D4_IT_B","D4 IT B");?></li>
        </ul>
      </div>
    <!--Kelas yang dipilih:
   <select disabled name="kelas">
     <option value="d3a" <?php echo ref("D3_IT_A");?> >D3 A</option>
     <option value="d3b" <?php echo ref("D3_IT_B");?> >D3 B</option>
     <option value="d4a" <?php echo ref("D4_IT_A");?> >D4 A</option>
     <option value="d4b" <?php echo ref("D4_IT_B");?> >D4 B</option>
   </select>--><br><br>
  <?php
   /*$options = array(
                 'd3a' => 'D3 A',
                 'd3b' => 'D3 B',
                 'd4a' => 'D4 A',
                 'd4b' => 'D4 B',
               );

   echo form_dropdown('', $options, '');*/

   //print_r(array_values($query));
   echo '<table class="table table-striped table-responsive">
   <thead><tr class="table-bordered">
   <th>NRP</th>
   <th>Nama</th>
   <th>Alamat</th>
   </tr></thead>';
   foreach($query as $row)
   {
       echo '<tr class="table-bordered">';
         echo "<td>".$row->nrp."</td>";
         echo "<td>".$row->nama."</td>";
         echo "<td>".$row->alamat."</td>";
         echo '<td class="table-bordered text-center"><div class="btn-group">';
         echo anchor("dbase/edit/{$row->nrp}", "<span class='glyphicon glyphicon-edit'></span> Edit", array('class' => 'btn btn-info'));
         echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal'.$row->nrp.'">Delete <span class="glyphicon glyphicon-trash"></span></button>';
         //echo anchor("dbase/delete/{$row->nrp}", "Delete <span class='glyphicon glyphicon-trash'></span>", array('class' => 'btn btn-danger'))."</div></td>";
       echo '</tr>'; ?>
       <!-- Modal -->
       <div id="myModal<?php echo $row->nrp; ?>" class="modal fade" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Konfirmasi</h4>
             </div>
             <div class="modal-body">
               <p>Apakah anda yakin ingin menghapus?</p>
             </div>
             <div class="modal-footer">
               <?php echo anchor("dbase/delete/{$row->nrp}", "Ya", array('class' => 'btn btn-danger')); ?>
               <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
             </div>
           </div> <?php
    }
   echo '</table><br>';
   echo anchor("dbase/insert", "<span class='glyphicon glyphicon-plus-sign'></span> Tambah Data", array('class' => 'btn btn-primary'));
  ?>
  </div>


    </div>
  </div>
 </body>
</html>
