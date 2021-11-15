<div class="container">

  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>

  <?= $this->session->flashdata('massage'); ?>

  <h3><?= $title; ?></h3>

  <button type="button" class="btn btn-primary mt-3 mb-5" data-toggle="modal" data-target="#exampleModal">Tambahkan </button>


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
              <th scope="col">Nama Penyakit</th>
              <th scope="col">nama Gejala</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($relasi as $rel) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td>
                  <a href="<?= base_url('pengaturan_admin/edit_relasi/' . $rel['id_relasi']); ?>" class="btn btn-warning badge btn-sm">Ubah</a>
                  <a href="<?= base_url('pengaturan_admin/hapus_relasi/' . $rel['id_relasi']); ?>" class="btn btn-danger badge btn-sm">Hapus</a>
                </td>
                <td><?= $rel['nama_penyakit']; ?></td>
                <td><?= $rel['gejala']; ?></td>
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
        <form action="<?= base_url('admin/relasi'); ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <select class="form-control" name="kd_penyakit" id="kd_penyakit">
                <option value="">Pilih Penyakit</option>
                <?php foreach ($penyakit as $m) : ?>
                  <option value="<?= $m['kd_penyakit']; ?>"><?= $m['nama_penyakit']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" name="kd_gejala" id="kd_gejala">
                <option value="">Pilih gejala</option>
                <?php foreach ($gejala as $g) : ?>
                  <option value="<?= $g['kd_gejala']; ?>"><?= $g['gejala']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" name="bobot" id="bobot">
                <option value="">Kategori Gejala</option>
                <option value="5">Gejala Berat</option>
                <option value="3">Gejala Sedang</option>
                <option value="1">Gejala Ringan</option>
              </select>
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
  <!-- akhir Modal -->