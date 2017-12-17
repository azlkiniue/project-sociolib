<?php
/**
 *
 */
class Site extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $json_data = array();
  }
  function get()
  {
    $this->db=$this->load->database('default', TRUE);
    $query=$this->db->get('data_kelas');
    // $json_data = array();
    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }
    return $json_data;
  }
  function peminjaman()
  {
    $sql="SELECT COUNT(*) jumlah, `tgl_pinjam` FROM `peminjaman` GROUP BY tgl_pinjam";
    $query=$this->db->query($sql);

    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }

    return $json_data;
  }
  function gender()
  {
    $sql="SELECT COUNT(*) value, gender label FROM `anggota` GROUP BY gender";
    $query=$this->db->query($sql);

    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }

    return $json_data;
  }
  function anggota()
  {
    $sql="SELECT tgl_daftar,
    (SELECT COUNT(*) FROM anggota WHERE tgl_daftar <= luar.tgl_daftar) AS jumlah,
    (SELECT COUNT(*) FROM anggota WHERE tgl_daftar <= luar.tgl_daftar AND gender = 'L') AS pria,
    (SELECT COUNT(*) FROM anggota WHERE tgl_daftar <= luar.tgl_daftar AND gender = 'P') AS wanita
    FROM anggota luar GROUP BY tgl_daftar";
    $query=$this->db->query($sql);

    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }

    return $json_data;
  }
  function umur_anggota()
  {
    $sql="SELECT
    CASE
        WHEN age < 20 THEN '< 20'
        WHEN age BETWEEN 20 and 29 THEN '20 - 29'
        WHEN age BETWEEN 30 and 39 THEN '30 - 39'
        WHEN age BETWEEN 40 and 49 THEN '40 - 49'
        WHEN age BETWEEN 50 and 59 THEN '50 - 59'
        WHEN age BETWEEN 60 and 69 THEN '60 - 69'
        WHEN age BETWEEN 70 and 79 THEN '70 - 79'
        WHEN age >= 80 THEN '> 80'
        WHEN age IS NULL THEN 'NULL'
    END as age_range,
    COUNT(*) AS count,
    CASE
        WHEN age < 20 THEN 1
        WHEN age BETWEEN 20 and 29 THEN 2
        WHEN age BETWEEN 30 and 39 THEN 3
        WHEN age BETWEEN 40 and 49 THEN 4
        WHEN age BETWEEN 50 and 59 THEN 5
        WHEN age BETWEEN 60 and 69 THEN 6
        WHEN age BETWEEN 70 and 79 THEN 7
        WHEN age >= 80 THEN 8
        WHEN age IS NULL THEN 9
    END as ordinal
    FROM (SELECT TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS age FROM anggota) as derived
    GROUP by age_range
    ORDER by ordinal";
    $query=$this->db->query($sql);

    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }

    return $json_data;
  }
  function data_buku()
  {
    $this->db->select('id, judul as value');
    $query = $this->db->get_where('buku', array('status' => 0));
    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }

    return $json_data;
  }
  function data_anggota()
  {
    $this->db->select('id, nama as value');
    $query = $this->db->get('anggota');
    foreach ($query->result_array() as $value) {
        $json_data[] = $value;
    }

    return $json_data;
  }
}

?>
