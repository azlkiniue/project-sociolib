<?php
class The_Sociolib extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Sociolib');
  }
  function index($tipe)
  {
    if (!isset($tipe)) {
      redirect('/the_sociolib/index/anggota', 'location');
    }
    $data['query']=$this->Sociolib->get($tipe);
    $this->load->view('the_sociolib/view', $data);
  }
  function insert($tipe)
  {
    $data['tipe']=$tipe;
    $this->load->view('the_sociolib/insert', $data);
  }
  function postInsert($tipe)
  {
    $this->Sociolib->insert($tipe);
    $data['tipe']=$tipe;
    $this->load->view('the_sociolib/postInsert', $data);
  }
  function edit($tipe, $id)
  {
    $data['query']=$this->Sociolib->select($tipe, $id);
    $data['tipe']=$tipe;
    $this->load->view('the_sociolib/edit', $data);
  }
  function postEdit($tipe, $id)
  {
    $this->Sociolib->edit($tipe, $id);
    $data['tipe']=$tipe;
    $this->load->view('the_sociolib/postEdit', $data);
  }
  function delete($tipe, $id)
  {
    $this->Sociolib->delete($tipe, $id);
    $data['tipe']=$tipe;
    $this->load->view('the_sociolib/delete', $data);
  }
  function peminjaman()
  {
    $this->load->view('the_sociolib/peminjaman');
  }
  function postPinjam()
  {
    // if(!isset($this->input->post('submit'))){ echo "string\n";}
    $this->Sociolib->insertPeminjaman();
    $this->Sociolib->setPeminjaman();
    // echo $this->Sociolib->getAutoIncrement('peminjaman_master');
    // var_dump(explode(", ",$this->input->post('id_buku')));
    $this->load->view('the_sociolib/postPinjam');
  }
  function dataPeminjaman()
  {
    $data['query']=$this->Sociolib->getPeminjaman();
    $this->load->view('the_sociolib/dataPeminjaman', $data);
  }
  function dataDonasi()
  {
    $data['query']=$this->Sociolib->getDonasi();
    $this->load->view('the_sociolib/dataDonasi', $data);
  }
  function donasi()
  {
    $this->load->view('the_sociolib/donasi');
  }
  function submitDonasi()
  {
    $this->Sociolib->insert('buku');
    $this->Sociolib->insert('donasi');
    $this->Sociolib->setDonasi();
    $this->load->view('the_sociolib/submitDonasi');
  }
  function kembali($id, $status)
  {
    $data['query']=$this->Sociolib->selectPinjam($id);
    $data['telat']=$status;
    $this->load->view('the_sociolib/kembali', $data);
  }
  function postKembali($id, $telat, $hilang) //termasuk denda
  {
    if($telat!="false" || $hilang!="false"){
      if($telat!="false"){
        $this->Sociolib->insertDenda(0, $telat, 0);
      }
      if($hilang!="false"){
        $this->Sociolib->insertDenda(1, 0, $hilang);
      }
    }
    $this->Sociolib->editPengembalian($id);
    $this->Sociolib->setPinjam(0, $this->input->post('id_buku'));
    // echo $this->input->post("id_buku");
    $this->load->view('the_sociolib/postKembali');
  }
  function denda()
  {
    $data['query']=$this->Sociolib->getDenda();
    $this->load->view('the_sociolib/denda', $data);
  }
  function postBayarDenda($id)
  {
    $this->Sociolib->editDenda($id);
    $this->load->view('the_sociolib/postBayarDenda');
  }
  function statistik()
  {
    $this->load->view('the_sociolib/statistik');
  }
  function contributor()
  {
    $data['query']=$this->Sociolib->getTopContributor();
    $this->load->view('the_sociolib/contributor', $data);
  }
  function test()
  {

  }
}
?>
