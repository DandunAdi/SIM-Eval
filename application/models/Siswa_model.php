<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
  // mengambil semua Siswa
  public function getAllSiswa()
  {
    return $this->db->get('tb_siswa');
  }

  // mengambil data Siswa berdasarkan tipe id
  public function getSiswaByType($id, $type)
  {
    // berdasarkan idSiswa
    if ($type == 'id_siswa') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['id_siswa' => $id])
        ->join('tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get();
    }

    // berdasarkan id_kelas
    if ($type == 'id_kelas') {
      $this->db->select('tb_siswa.*, tb_kelas.*')
        ->from('tb_siswa')
        ->where(['id_kelas' => $id])
        ->join('tb_kelas.id_kelas = tb_siswa.id_kelas');
      return $this->db->get();
    }
  }

  // update Siswa dari id
  public function upadateSiswaById($idSiswa, $data)
  {
    return $this->db->update('tb_siswa', $data, ['id_siswa' => $idSiswa]);
  }

  // delete Siswa
  public function deleteSiswaByType($id, $type)
  {
    // berdasarkan id Siswa
    if ($type == 'id_siswa')
      return $this->db->delete('tb_siswa', ['id_siswa' => $id]);


    if ($type == 'id_kelas')
      return $this->db->delete('tb_siswa', ['id_kelas' => $id]);
  }
}