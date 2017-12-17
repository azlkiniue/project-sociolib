<?php
class Dbase extends CI_Controller
{
	// function __construct()
	// {
	// 	parent::__construct();
	// 	// $this->load->database('default');
	// }
	function index($kelas)
	{
		// $this->load->database('default');
		$this->load->model('Database');
		if (!isset($kelas)) {
			 redirect('/dbase/index/D3_IT_A', 'location');
		}
		$data['query']=$this->Database->getDbase($kelas);
		$this->load->helper('String');
		$this->load->view('Project/dbase', $data);
	}
	function insert()
	{
		$this->load->view('Project/insert');
	}
	function postInsert()
	{
		$this->load->model('Database');
		$this->Database->insertData();
		$this->load->view('Project/postInsert');
		/*echo "Data sudah masuk";
		echo "<br>".anchor("dbase","Kembali");*/
	}
	function edit($nrpdata)
	{
		$this->load->model('Database');
		$data['query']=$this->Database->select($nrpdata);
		$this->load->view('Project/edit', $data);
	}
	function postEdit($nrpdata)
	{
		$this->load->model('Database');
		$this->Database->editData($nrpdata);
		$this->load->view('Project/postEdit');
		/*echo "Data berhasil diubah";
		echo "<br>".anchor("dbase","Kembali");*/
	}
	function delete($nrpdata)
	{
		$this->load->model('Database');
		$this->Database->delete($nrpdata);
		$this->load->view('Project/delete');
		/*echo "Data berhasil dihapus";
		echo "<br>".anchor("dbase","Kembali");*/
	}
}
?>
