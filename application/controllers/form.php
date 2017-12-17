<?php
class Form extends CI_Controller
{
function index()
{
	$this->load->view('form');
	$this->load->helper('form');
}
function jumlah()
{
$angka1=$this->input->post('angka1');
$angka2=$this->input->post('angka2');
$hasil=$angka1+$angka2;
echo "Hasilnya adalah : ".$hasil;
echo "<br/>".anchor("form/index","Kembali");
}
} ?>
