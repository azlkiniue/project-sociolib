<?php
  class Sociolib extends CI_Model
  {
    // function __construct()
    // {
    //   parent::__construct();
    // }
    function get($tabel)
    {
      $query=$this->db->get($tabel);
      return $query->result();
    }
    function getPeminjaman()
    {
      $sql='select m.*, d.*, b.judul, a.nama
      from anggota a, buku b, peminjaman_master m, peminjaman_detail d
      where m.no_transaksi=d.no_transaksi and a.id=m.id_anggota and b.id=d.id_buku';
      $query=$this->db->query($sql);
      return $query->result();
    }
    function getDonasi()
    {
      $sql='select d.*, b.judul, a.nama
      from anggota a, buku b, donasi d
      where a.id=d.id_anggota and b.id=d.id_buku
      order by d.no_transaksi';
      $query=$this->db->query($sql);
      return $query->result();
    }
    function getDenda()
    {
      $sql='select d.*, b.judul, a.nama
      from anggota a, buku b, denda d
      where a.id=d.id_anggota and b.id=d.id_buku
      order by d.no_transaksi';
      $query=$this->db->query($sql);
      return $query->result();
    }
    function getAutoIncrement($tabel)
    {
      $sql="SELECT `AUTO_INCREMENT`
      FROM  INFORMATION_SCHEMA.TABLES
      WHERE TABLE_SCHEMA = 'sociolib'
      AND   TABLE_NAME   = '{$tabel}'";
      $query=$this->db->query($sql);
      $result=$query->result();
      return $result[0]->AUTO_INCREMENT;
    }
    function getTopContributor()
    {
      $sql="SELECT jml_buku_donasi AS jumlah, GROUP_CONCAT(nama SEPARATOR ', ') AS kontributor FROM anggota WHERE jml_buku_donasi>0 GROUP BY jml_buku_donasi ORDER BY jml_buku_donasi DESC LIMIT 10";
      $query=$this->db->query($sql);
      return $query->result();
    }
    function getJumlahDonasi($id)
    {
      $query=$this->db->get_where('anggota', array('id'=>$id));
      $result=$query->result();
      return $result[0]->jml_buku_donasi;
    }
    function select($tabel, $id)
    {
      $query=$this->db->get_where($tabel, array('id'=>$id));
      return $query->result();
    }
    function selectPeminjaman($id)
    {
      $sql="select p.*, b.judul, b.harga, a.nama
      from anggota a, buku b, peminjaman p
      where p.no_transaksi={$id}
      and a.id=p.id_anggota and b.id=p.id_buku";
      $query=$this->db->query($sql);
      return $query->result();
    }
    function selectPinjam($id)
    {
      $sql="select m.*, d.*, b.judul, b.harga, a.nama
      from anggota a, buku b, peminjaman_master m, peminjaman_detail d
      where d.id={$id}
      and m.no_transaksi=d.no_transaksi and a.id=m.id_anggota and b.id=d.id_buku";
      $query=$this->db->query($sql);
      return $query->result();
    }
    function insert($tabel)
    {
      if ($tabel=='buku') {
        $data = array(
          'judul' => $this->input->post('judul'),
          'tahun' => $this->input->post('tahun'),
          'penerbit' => $this->input->post('penerbit'),
          'penulis' => $this->input->post('penulis'),
          'harga' => $this->input->post('harga')
        );
      } elseif ($tabel=='anggota') {
        $data = array(
          'nama' => $this->input->post('nama'),
          'gender' => $this->input->post('gender'),
          'tgl_lahir' => $this->input->post('tgl_lahir'),
          'alamat' => $this->input->post('alamat'),
          'pekerjaan' => $this->input->post('pekerjaan'),
          'no_hp' => $this->input->post('no_hp'),
          'tgl_daftar' => substr(date(DATE_ATOM), 0, 10)
        );
      } elseif ($tabel=='peminjaman') {
        $data = array(
          'id_anggota' => $this->input->post('id_anggota'),
          'id_buku' => $this->input->post('id_buku'),
          'tgl_pinjam' => substr(date(DATE_ATOM), 0, 10)
        );
      } elseif ($tabel=='donasi') {
        $this->load->model('Sociolib');
        $data = array(
          'id_anggota' => $this->input->post('id_anggota'),
          'id_buku' => $this->Sociolib->getAutoIncrement('buku')-1,
          'tgl_donasi' => substr(date(DATE_ATOM), 0, 10)
        );
      }
      $this->db->insert($tabel, $data);
    }
    function insertPeminjaman()
    {
      $data = array(
        'id_anggota' => $this->input->post('id_anggota'),
        'tgl_pinjam' => substr(date(DATE_ATOM), 0, 10)
      );
      $this->db->insert('peminjaman_master', $data);

      $buku = explode(", ",$this->input->post('id_buku'));
      for ($i=0; $i < count($buku)-1; $i++) {
        $data = array(
          'no_transaksi' => $this->Sociolib->getAutoIncrement('peminjaman_master')-1,
          'id_buku' => $buku[$i]
        );
        $this->db->insert('peminjaman_detail', $data);
      }

    }
    function insertDenda($jenis_denda, $telat, $hilang)
    {
      $data = array(
        'id_anggota' => $this->input->post('id_anggota'),
        'id_buku' => $this->input->post('id_buku'),
        'jenis_denda' => $jenis_denda,
        'biaya' => $hilang+($telat*5000)
      );
      $this->db->insert('denda', $data);
    }
    function edit($tabel, $id)
    {
      if ($tabel=='buku') {
        $data = array(
          'judul' => $this->input->post('judul'),
          'tahun' => $this->input->post('tahun'),
          'penerbit' => $this->input->post('penerbit'),
          'penulis' => $this->input->post('penulis'),
          'harga' => $this->input->post('harga')
        );
      } elseif ($tabel=='anggota') {
        $data = array(
          'nama' => $this->input->post('nama'),
          'gender' => $this->input->post('gender'),
          'tgl_lahir' => $this->input->post('tgl_lahir'),
          'alamat' => $this->input->post('alamat'),
          'pekerjaan' => $this->input->post('pekerjaan'),
          'no_hp' => $this->input->post('no_hp')
        );
      } elseif ($tabel=='peminjaman') {
        $data = array('tgl_kembali' => substr(date(DATE_ATOM), 0, 10) );
      }
      $this->db->where('id', $id);
      $this->db->update($tabel, $data);
    }
    function editKembali($no)
    {
      $this->db->where('no_transaksi', $no);
      $this->db->update("peminjaman", array('tgl_kembali' => substr(date(DATE_ATOM), 0, 10)) );
    }
    function editPengembalian($no)
    {
      $this->db->where('id', $no);
      $this->db->update("peminjaman_detail", array('tgl_kembali' => substr(date(DATE_ATOM), 0, 10)) );
    }
    function editDenda($no)
    {
      $this->db->where('no_transaksi', $no);
      $this->db->update("denda", array('bayar' => $this->input->post('bayar') ));
    }
    function setPeminjaman()
    {
      $buku = explode(", ",$this->input->post('id_buku'));
      for ($i=0; $i < count($buku)-1; $i++) {
        $this->Sociolib->setPinjam(1, $buku[$i]);
      }
    }
    function setPinjam($status, $id)
    {
      if ($status==1) {
        $this->db->where('id', $id);
        $this->db->update("buku", array('status' => 1 ));
      }
      elseif ($status==0) {
        $this->db->where('id', $id);
        $this->db->update("buku", array('status' => 0 ));
      }
    }
    function setDonasi()
    {
      $this->load->model('Sociolib');
      // $id=$this->input->post('id_anggota');
      // var_dump($id);
      $data=array('jml_buku_donasi' => ($this->Sociolib->getJumlahDonasi($this->input->post('id_anggota'))+1) );
      $this->db->where('id', $this->input->post('id_anggota'));
      $this->db->update("anggota", $data);

      // $sql='UPDATE anggota SET jml_buku_donasi = '3' WHERE id=?';
      // $this->db->query($sql, $this->input->post('id_anggota'));
    }
    function delete($tabel, $id)
    {
      $this->db->where('id', $id);
      $this->db->delete($tabel);
      $sql="ALTER TABLE {$tabel} AUTO_INCREMENT={$id}";
      $this->db->query($sql);
    }
    /* buku   : judul, tahun, penerbit, penulis
       anggota: nama, gender, alamat, no_hp */
  }
?>
