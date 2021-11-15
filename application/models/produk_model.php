<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk_model extends CI_Model
{

  public function find($id)
  {
    $result = $this->db->where('id', $id)
      ->limit(1)
      ->get('produk');
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return array();
    }
  }

  public function invoice()
  {
    date_default_timezone_set('Asia/jakarta');
    $id_user = $this->input->post('id_user');
    $alamat = $this->input->post('alamat');
    $telepon = $this->input->post('telepon');
    $jasa = $this->input->post('jasa');
    $bank = $this->input->post('bank');
    $status = $this->input->post('status');
    $ket = $this->input->post('ket');

    $invoice = array(
      'id_user' => $id_user,
      'alamat' => $alamat,
      'telepon' => $telepon,
      'jasa' => $jasa,
      'bank' => $bank,
      'status' => $status,
      'ket' => $ket,
      'tgl_pesan' => date('Y-m-d H:i:s'),
      'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
    );
    $this->db->insert('invoice', $invoice);
    $id_invoice = $this->db->insert_id();

    foreach ($this->cart->contents() as $item) {
      $data = array(
        'id_invoice' => $id_invoice,
        'id_produk'  => $item['id'],
        'nama_produk' => $item['name'],
        'jumlah'     => $item['qty'],
        'harga'      => $item['price'],
      );
      $this->db->insert('pesanan', $data);
    }
    return TRUE;
  }


  public function detail_invoice($id)
  {
    $result = $this->db->where('id', $id)->get('invoice');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }

  public function ambil_id_invoice($id_invoice)
  {
    $result = $this->db->where('id', $id_invoice)->limit(1)->get('invoice');
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return false;
    }
  }


  public function ambil_id_pesanan($id_invoice)
  {
    $result = $this->db->where('id_invoice', $id_invoice)->get('pesanan');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }

  public function getInvoice()
  {
    $query = "SELECT * FROM invoice JOIN user ON invoice.id_user = user.id_user";

    return $this->db->query($query)->result_array();
  }






}
