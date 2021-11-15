<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perawatan_model extends CI_Model
{

  public function data_detail($id)
  {
    $result = $this->db->where('id', $id)->get('perawatan');
    if ($result->num_rows() > 0) {
      return $result->result();
    }else {
      return false;
    }

  }

  public function getperawatan()
  {
    $query = "SELECT *
              FROM `booking`
              INNER JOIN `perawatan` ON `booking`.`id_perawatan` = `perawatan`.`id`
              INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` 
            ";

    return $this->db->query($query)->result_array();
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  public function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }



}

/* End of file Kategori_model.php */
