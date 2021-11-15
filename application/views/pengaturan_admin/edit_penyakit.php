<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php foreach ($penyakit as $kit) : ?>

                <form action="<?= base_url('pengaturan_admin/update_penyakit') ?>" method="post">

                    <div class="form-group row">
                        <label for="kd_penyakit" class="col-sm-2 col-form-label">Kode Penyakit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kd_penyakit" name="kd_penyakit" value="<?= $kit->kd_penyakit; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_penyakit" class="col-sm-2 col-form-label">Nama Penyakit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="<?= $kit->nama_penyakit; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="definisi" class="col-sm-2 col-form-label">Definisi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="definisi" value="<?= $kit->definisi; ?>" id="definisi" cols="30" rows="5"><?= $kit->definisi; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="solusi" class="col-sm-2 col-form-label">Tindakan Perawatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="solusi" value="<?= $kit->solusi; ?>" id="solusi" cols="30" rows="5"><?= $kit->solusi; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </div>
                    </div>

                </form>
            <?php endforeach; ?>

        </div>
    </div>

</div>