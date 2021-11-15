      <div class="container-fluid">


        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>

        <?= $this->session->flashdata('massage'); ?>

        <h3><?= $title; ?></h3>

        <!-- Tombol Modal -->
        <button type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#exampleModal">Tambahkan</button>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Kode Penyakit</th>
                    <th scope="col">Kama Penyakit</th>
                    <th scope="col">Definisi</th>
                    <th scope="col">Tindakan Perawatan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($penyakit as $kit) : ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td>
                        <a href="<?= base_url('pengaturan_admin/edit_penyakit/' . $kit['kd_penyakit']); ?>" class="btn btn-warning badge btn-sm">Ubah</a>
                        <a href="<?= base_url('pengaturan_admin/hapus_penyakit/' . $kit['kd_penyakit']); ?>" class="btn btn-danger badge btn-sm">Hapus</a>
                      </td>
                      <td><?= $kit['kd_penyakit']; ?></td>
                      <td><?= $kit['nama_penyakit']; ?></td>
                      <td><?= $kit['definisi']; ?></td>
                      <td><?= $kit['solusi']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>






        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('admin/penyakit_solusi'); ?>" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="kd_penyakit" id="kd_penyakit" class="form-control" id="formGroupExampleInput" placeholder="Kode Penyakit">
                  </div>
                  <div class="form-group">
                    <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control" id="formGroupExampleInput" placeholder="nama Penyakit">
                  </div>
                  <div class="form-group">
                    <input type="text" name="definisi" id="definisi" class="form-control" id="formGroupExampleInput" placeholder="definisi">
                  </div>
                  <div class="form-group">
                    <input type="text" name="solusi" id="solusi" class="form-control" id="formGroupExampleInput" placeholder="solusi">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>

            </div>
          </div>
        </div>
        <!-- Akhir Modal -->