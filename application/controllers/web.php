<?php
/**
 *
 */
class Web extends CI_Controller
{
  function index($fungsi)
  {
    $this->load->model('Site');
    if(!isset($fungsi)||$fungsi=="null"){
      echo json_encode($this->Site->get());
    }
    elseif ($fungsi=="peminjaman") {
      echo json_encode($this->Site->peminjaman());
    }
    elseif ($fungsi=="gender") {
      echo json_encode($this->Site->gender());
    }
    elseif ($fungsi=="anggota") {
      echo json_encode($this->Site->anggota());
    }
    elseif ($fungsi=="data_buku") {
      echo json_encode($this->Site->data_buku());
    }
    elseif ($fungsi=="data_anggota") {
      echo json_encode($this->Site->data_anggota());
    }
    elseif ($fungsi=="umur_anggota") {
      echo json_encode($this->Site->umur_anggota());
    }
  }
  function statistik($set)
  {
    if ($set=='1') {
      $doc = new DomDocument;

      // We need to validate our document before refering to the id
      $doc->validateOnParse = true;
      $doc->loadHtml(file_get_contents(site_url("project_sociolib/statistik")));

      var_dump($doc->getElementsByTagName('div'));
    }

  }
}

?>
