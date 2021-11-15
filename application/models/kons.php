<?php
defined('BASEPATH') or exit('No direct script access allowed');

class konsultasi_model extends CI_model
{
  public function getrelasi()
  {
    $query = "SELECT * FROM relasi INNER JOIN gejala ON relasi.kd_gejala = gejala.kd_gejala INNER JOIN penyakit_solusi ON relasi.kd_penyakit = penyakit_solusi.kd_penyakit";

    return $this->db->query($query)->result_array();
  }


  public function getgejala()
  {
    return $this->db->select('s.*, as.kd_gejala')
      ->from('gejala as s')
      ->join('tmp_gejala as as', 'as.kd_gejala = s.kd_gejala', 'left')
      ->get()
      ->result();
  }


  public function proses_diagnosa()
  {
    ob_start();
    $kd_gejala = $this->input->post('kd_gejala');


    $data = $kd_gejala;



    $pecah =  $data;

    $text = "";

    for ($i = 0; $i <= count((array)$pecah) - 1; $i++) {
      $part = str_replace($pecah[$i], "<p>" . $pecah[$i] . "</p>", $pecah[$i]);
      $text .= $part;
    }
    $query = $this->db->query("DELETE FROM tmp_gejala");

    $text_line = $data;
    $text_line = $data;

    $posisi = 0;
    for ($start = 0; $start < count((array)$text_line); $start++) {
      $baris = $text_line[$start];

      $sql = $this->db->query("INSERT INTO tmp_gejala (kd_gejala) VALUES ('$baris')");
      $posisi++;
      print $text_line[$start];
    }
    ob_start();

    $query = $this->db->query("DELETE FROM tmp_penyakit");

    $sqlpenyakit = $this->db->query("SELECT * FROM relasi GROUP BY kd_penyakit");
    // $querypenyakit=$this->db->query($sqlpenyakit)->result_array();


    $Similarity = 0;


    foreach ($sqlpenyakit->result() as $rowpenyakit) {

      $kd_pen = $rowpenyakit->kd_penyakit;


      $query_gejala = $this->db->query("SELECT * FROM relasi WHERE kd_penyakit='$kd_pen'");
      // $gejala = $this->db->query($query_gejala)->result();


      $var1 = 0;
      $var2 = 0;


      $querySUM = "select sum(bobot)AS jumlahbobot from relasi where kd_penyakit='$kd_pen'";
      $resSUM = $this->db->query($querySUM)->row_array();

      $SUMbobot = $resSUM['jumlahbobot'];

      foreach ($query_gejala->result() as $row_gejala) {

        $kode_gejala_relasi = $row_gejala->kd_gejala;
        $bobotRelasi = $row_gejala->bobot;




        // mencari data di tabel tmp_gejala dan membandingkannya
        $query_tmp_gejala = $this->db->query("SELECT * FROM tmp_gejala WHERE kd_gejala='$kode_gejala_relasi'");
        //  $row_tmp_gejala=$this->db->query($query_tmp_gejala)->result_array();



        // echo $query_tmp_gejala;

        if ($query_tmp_gejala->num_rows() > 0) {

          $adadata = $query_tmp_gejala->row();



          if ($adadata !== 0) {
            $bobotNilai = $bobotRelasi * 1;
            // $HasilKaliSatu;
            $var1 = $bobotNilai / $SUMbobot;
          } else {
            $bobotNilai = $bobotRelasi * 0;
            $var2 = $bobotNilai + $bobotNilai;
          }
        }

        $Nilai_tmp_gejala = $var1 + $var2; //echo "Nilai akhir".$Nilai_tmp_gejala;
        $Nilai_bawah = $bobotRelasi;
        $Nilai_Pembilang = $Nilai_tmp_gejala;
        $Nilai_Penyebut = $Nilai_bawah;


        // menghasilkan nilai Similarity dengan membagikan $Nilai_Pembilang/$Nilai_Penyebut
        $Similarity = $Nilai_Pembilang / $Nilai_Penyebut;
      }



      $query_tmp_penyakit = $this->db->query("INSERT INTO tmp_penyakit(kd_penyakit,nilai) VALUES ('$kd_pen','$var1')");
    }
  }

  // public function nilaiSum()
  // {
  //   $query_nilai="SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit";
  //   return $this->db->query($query_nilai)->row_array();
  //  // $nilaiTotal=$rowSUM['nilaiSum'];
  // }

  // public function sumTmp()
  // {
  //   $query_sum_tmp=$this->db->query("SELECT * FROM tmp_penyakit WHERE NOT nilai='0' ORDER BY nilai DESC LIMIT 0,2");

  //   return $query_sum_tmp->result_array();

  //   foreach($query_sum_tmp->result() as $row_sumtmp){
  //     $nilai=$row_sumtmp->nilai;
  //     $kd_pen2=$row_sumtmp->kd_penyakit;

  //   }

  //   function getkonsultasi($kd_pen2)
  //   {   
  //       $query_penyasol= "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'";  

  //       return $this->db->query($query_penyasol)->result_array();
  //   }


  // }




}



    // $query_nilai="SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit";
    // $rowSUM=$this->db->query($query_nilai)->row_array();
    // $nilaiTotal=$rowSUM['nilaiSum'];
    

    // $query_sum_tmp=$this->db->query("SELECT * FROM tmp_penyakit WHERE NOT nilai='0' ORDER BY nilai DESC LIMIT 0,2");

    // foreach($query_sum_tmp->result() as $row_sumtmp){
    //   $nilai=$row_sumtmp->nilai;
    //   $nilai_persen=$nilai/$nilaiTotal*100;
    //   $data_persen=$nilai_persen;
    //   $persen=substr($data_persen,0,5);
      
    //   $kd_pen2=$row_sumtmp->kd_penyakit;
      
    //   $query_penyasol=$this->db->query("SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'");
    //   foreach($query_penyasol->result() as $row_penyasol){
    //     echo "<strong>Anda Menderita Penyakit ". $row_penyasol->nama_penyakit. " Sebesar ". $persen."%". "</strong><br>";
    //     echo "<p>".$row_penyasol->definisi."</p>";
    //     echo "<p>"."<strong>Solusi Pengobatan :</strong> ".$row_penyasol->solusi."</p><hr>";
    //     }
        
    //   }