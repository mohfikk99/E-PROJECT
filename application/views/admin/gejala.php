<div class="container">

  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>

  <?= $this->session->flashdata('massage'); ?>

  <h3><?= $title; ?></h3>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#exampleModal">
    Tambahkan
  </button>

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
              <th scope="col">Kode gejala</th>
              <th scope="col">Nama gejala</th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($gejala as $gel) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td>
                  <a href="<?= base_url('pengaturan_admin/edit_gejala/' . $gel['kd_gejala']); ?>" class="btn btn-warning badge btn-sm">Ubah</a>
                  <a href="<?= base_url('pengaturan_admin/hapus_gejala/' . $gel['kd_gejala']); ?>" class="btn btn-danger badge btn-sm">Hapus</a>
                </td>
                <td><?= $gel['kd_gejala']; ?></td>
                <td><?= $gel['gejala']; ?></td>

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

        <form action="<?= base_url('admin/gejala'); ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" name="kd_gejala" id="kd_gejala" class="form-control" id="formGroupExampleInput" placeholder="Kode gejala">
            </div>
            <div class="form-group">
              <input type="text" name="gejala" id="gejala" class="form-control" id="formGroupExampleInput" placeholder="gejala">
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