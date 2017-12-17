<?php
class Project_Sociolib extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Sociolib');
  }
  function index($tipe)
  {
    if (!isset($tipe)) {
      redirect('/project_sociolib/index/anggota', 'location');
    }
    $data['query']=$this->Sociolib->get($tipe);
    $this->load->view('sociolib/view', $data);
  }
  function insert($tipe)
  {
    $data['tipe']=$tipe;
    $this->load->view('sociolib/insert', $data);
  }
  function postInsert($tipe)
  {
    $this->Sociolib->insert($tipe);
    $data['tipe']=$tipe;
    $this->load->view('sociolib/postInsert', $data);
    // echo "Data sudah masuk";
		// echo "<br>".anchor("project_sociolib/index/{$tipe}","Kembali");
  }
  function edit($tipe, $id)
  {
    $data['query']=$this->Sociolib->select($tipe, $id);
    $data['tipe']=$tipe;
    $this->load->view('sociolib/edit', $data);
  }
  function postEdit($tipe, $id)
  {
    $this->Sociolib->edit($tipe, $id);
    $data['tipe']=$tipe;
    $this->load->view('sociolib/postEdit', $data);
    // echo "Data berhasil diubah";
		// echo "<br>".anchor("project_sociolib/index/{$tipe}","Kembali");
  }
  function delete($tipe, $id)
  {
    $this->Sociolib->delete($tipe, $id);
    $data['tipe']=$tipe;
    $this->load->view('sociolib/delete', $data);
    // echo "Data berhasil dihapus";
		// echo "<br>".anchor("project_sociolib/index/{$tipe}","Kembali");
  }
  function peminjaman()
  {
    $this->load->view('sociolib/peminjaman');
  }
  function postPinjam()
  {
    // if(!isset($this->input->post('submit'))){ echo "string\n";}
    $this->Sociolib->insert('peminjaman');
    $this->Sociolib->setPinjam(1);
    $this->load->view('sociolib/postPinjam');
    // echo "Data sudah masuk";
		// echo "<br>".anchor("project_sociolib/dataPeminjaman","Kembali");
  }
  function dataPeminjaman()
  {
    $data['query']=$this->Sociolib->getPeminjaman();
    $this->load->view('sociolib/dataPeminjaman', $data);
  }
  function dataDonasi()
  {
    $data['query']=$this->Sociolib->getDonasi();
    $this->load->view('sociolib/dataDonasi', $data);
  }
  function donasi()
  {
    $this->load->view('sociolib/donasi');
  }
  function submitDonasi()
  {
    $this->Sociolib->insert('buku');
    $this->Sociolib->insert('donasi');
    $this->Sociolib->setDonasi();
    // var_dump($this->input->post('id_anggota'));
    $this->load->view('sociolib/submitDonasi');
    // echo "Data sudah masuk, terimakasih atas donasi anda.";
		// echo "<br>".anchor("project_sociolib/donasi","Kembali");
  }
  function kembali($id, $status)
  {
    $data['query']=$this->Sociolib->selectPeminjaman($id);
    $data['telat']=$status;
    $this->load->view('sociolib/kembali', $data);
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
    $this->Sociolib->editKembali($id);
    $this->Sociolib->setPinjam(0);
    // echo $this->input->post("id_buku");
    $this->load->view('sociolib/postKembali');
    // echo "Data sudah masuk";
		// echo "<br>".anchor("project_sociolib/dataPeminjaman","Kembali");
  }
  function denda()
  {
    $data['query']=$this->Sociolib->getDenda();
    $this->load->view('sociolib/denda', $data);
  }
  function postBayarDenda($id)
  {
    $this->Sociolib->editDenda($id);
    // var_dump($this->input->post('bayar'));
    $this->load->view('sociolib/postBayarDenda');
    // echo "Data sudah masuk";
		// echo "<br>".anchor("project_sociolib/denda","Kembali");
  }
  function statistik()
  {
    $this->load->view('sociolib/statistik');
  }
  function contributor()
  {
    $data['query']=$this->Sociolib->getTopContributor();
    $this->load->view('sociolib/contributor', $data);
  }
  function pdf()
  {
    $this->load->library('Pdf');

    // create new PDF document
    $pdf = new Pdf();

    // set font
    $pdf->SetFont('times', '', 16);

    // add a page
    $pdf->AddPage();

    // print a line
    $pdf->Cell(0, 0, 'Some text');

    // print html formated text
    $pdf->writeHtml('Html text:<br /><b>Bold</b>');

    // draw a circle
    $pdf->Circle(30, 30, 10);

    //Close and output PDF document
    $pdf->Output('out.pdf', 'I');
  }
  function test()
  {
    $this->load->view('sociolib/postBayarDenda');
  }
}
?>
