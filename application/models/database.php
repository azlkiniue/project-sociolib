<?php
  class Database extends CI_Model
  {
    function __construct()
    {
      parent::__construct();
      $this->db=$this->load->database('default', TRUE);
    }

    function getDbase($kelas)
    {
      //$query=$this->db->get('data_kelas');
      $query=$this->db->get_where('data_kelas',array('kelas'=>$kelas));
      return $query->result();
    }

    function select($nrp)
    {
      $sql='select * from data_kelas where nrp=?';
      $query=$this->db->query($sql, $nrp);
      return $query->result();
    }

    function insertData()
    {
      $data = array(
        'nrp' => $this->input->post('nrp'),
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'kelas' => $this->input->post('kelas')
      );

      $this->db->insert('data_kelas', $data);

      // Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
    }

    function editData($nrp)
    {
      $data = array(
        'nrp' => $this->input->post('nrp'),
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'kelas' => $this->input->post('kelas')
      );
      $this->db->where('nrp', $nrp);
      $this->db->update('data_kelas', $data);
    }

    function delete($nrp)
    {
      $this->db->where('nrp', $nrp);
      $this->db->delete('data_kelas');
    }
  }
?>
