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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data Admin</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Aksi</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($admin as $ad) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td>
                  <a href="<?= base_url('pengaturan_admin/edit_admin/' . $ad['id']); ?>" class="btn btn-warning badge btn-sm">Ubah</a>
                  <a href="<?= base_url('pengaturan_admin/hapus_admin/' . $ad['id']); ?>" class="btn btn-danger badge btn-sm">Hapus</a>
                </td>
                <td><?= $ad['username']; ?></td>
                <td><?= $ad['password']; ?></td>
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

        <form action="<?= base_url('admin'); ?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" name="username" id="username" class="form-control" id="formGroupExampleInput" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="text" name="password" id="password" class="form-control" id="formGroupExampleInput" placeholder="Password">
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