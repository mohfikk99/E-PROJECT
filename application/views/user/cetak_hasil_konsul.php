<strong>Gejala Anda :</strong>
<?php

$gel = "SELECT * FROM tmp_gejala JOIN gejala ON tmp_gejala.kd_gejala = gejala.kd_gejala";

$gejala = $this->db->query($gel)->result_array();


foreach($gejala as $gel) : ?>
<strong><?= $gel['gejala'];?></strong>
<?php endforeach; ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Penyakit</th>
            <th scope="col">Definisi</th>
            <th scope="col">Tindakan Perawatan</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $query_nilai = "SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit";
        $rowSUM = $this->db->query($query_nilai)->row_array();
        $nilaiTotal = $rowSUM['nilaiSum'];


        $query_sum_tmp = $this->db->query("SELECT * FROM tmp_penyakit WHERE NOT nilai='0' ORDER BY nilai DESC LIMIT 0,2");
        ?>
        <?php foreach ($query_sum_tmp->result() as $row_sumtmp) : ?>
            <?php
            $nilai = $row_sumtmp->nilai;
            $nilai_persen = $nilai / $nilaiTotal * 100;
            $data_persen = $nilai_persen;
            $persen = substr($data_persen, 0, 5);

            $kd_pen2 = $row_sumtmp->kd_penyakit;

            $query_penyasol = $this->db->query("SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kd_pen2'");
            ?>
            <?php $i = 1; ?>
            <?php foreach ($query_penyasol->result() as $row_penyasol) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td>Anda Menderita Penyakit " <?= $row_penyasol->nama_penyakit; ?>" Sebesar "<?= $persen . "%"; ?>"</td>
                    <td><?= $row_penyasol->definisi; ?></td>
                    <td><strong>Solusi Pengobatan :</strong>"<?= $row_penyasol->solusi; ?>"</td>
                </tr>
                <tr>

                </tr>

            <?php endforeach; ?>
            <?php $i++; ?>

        <?php endforeach; ?>


    </tbody>
    
</table>

<script>
    window.print();
</script>