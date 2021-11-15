<div id="services" class="our-services section">
  <div class="services-right-dec">
    <img src="<?= base_url('assets/'); ?>images/services-right-dec.png" alt="">
  </div>
  <div class="container">
    <div class="services-left-dec">
      <img src="<?= base_url('assets/'); ?>images/services-left-dec.png" alt="">
    </div>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading">
          <h2><span>Hasil Diagnosa</span></h2>
          <span>Hasil Diagnosa</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">

        <h5><strong>Gejala Anda :</strong></h5>
        <ul class="mb-5">
          <?php

          $gel = "SELECT * FROM tmp_gejala JOIN gejala ON tmp_gejala.kd_gejala = gejala.kd_gejala";

          $gejala = $this->db->query($gel)->result_array();


          foreach ($gejala as $gel) : ?>

            <li>*
              <?= $gel['gejala']; ?>
            </li>
          <?php endforeach; ?>
        </ul>


        <table class="table text-center mt-5">
          <thead>
            <tr>
              <th scope="col">Nama Penyakit</th>
              <th scope="col">Definisi</th>
              <th scope="col">Solusi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query_nilai = "SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit";
            $rowSUM = $this->db->query($query_nilai)->row_array();
            $nilaiTotal = $rowSUM['nilaiSum'];

            $query_sum_tmp = $this->db->query("SELECT * FROM tmp_penyakit WHERE NOT nilai='0' ORDER BY nilai DESC LIMIT 0,2");

            foreach ($query_sum_tmp->result() as $row_sumtmp) :

              $nilai = $row_sumtmp->nilai;
              $nilai_persen = $nilai / $nilaiTotal * 100;
              $data_persen = $nilai_persen;
              $persen = substr($data_persen, 0, 5);

              $kd_pen2 = $row_sumtmp->kd_penyakit;

              $query_penyasol = $this->db->query("SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'");

              foreach ($query_penyasol->result() as $row_penyasol) :
            ?>

                <tr>
                  <td>Anda Menderita Penyakit " <?= $row_penyasol->nama_penyakit; ?>" Sebesar "<?= $persen . "%"; ?>"</td>
                  <td><?= $row_penyasol->definisi; ?></td>
                  <td><strong>Solusi Pengobatan :</strong>"<?= $row_penyasol->solusi; ?>"</td>
                </tr>

              <?php endforeach; ?>
            <?php endforeach; ?>

            <!-- <a href="<?= base_url('user/cetak_hasil_konsul'); ?>" class="btn btn-light  mb-5 mt-5" target="_BLANK">Cetak Data Konsultasi Anda</a> -->


          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>