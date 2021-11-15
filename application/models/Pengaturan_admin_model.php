<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_admin_model extends CI_model
{


  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  public function getRelasi($id_relasi)
  {
    $query = "SELECT *
              FROM relasi 
              INNER JOIN gejala
              ON relasi.kd_gejala = gejala.kd_gejala
              INNER JOIN penyakit_solusi
              ON relasi.kd_penyakit = penyakit_solusi.kd_penyakit
              WHERE relasi.id_relasi = $id_relasi
              ";

    return $this->db->query($query)->result_array();
  }


  function hapus_penyakit($kd_penyakit)
  {
    $query = $this->db->query("DELETE FROM penyakit_solusi WHERE kd_penyakit = '$kd_penyakit'");
  }

  function hapus_gejala($kd_gejala)
  {
    $query = $this->db->query("DELETE FROM gejala WHERE kd_gejala = '$kd_gejala'");
  }

  function hapus_relasi($id_relasi)
  {
    $query = $this->db->query("DELETE FROM relasi WHERE id_relasi = '$id_relasi'");
  }

  function hapus_admin($id)
  {
    $query = $this->db->query("DELETE FROM admin WHERE id = '$id'");
  }
}
