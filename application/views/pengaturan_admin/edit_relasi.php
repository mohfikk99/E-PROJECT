<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php foreach ($relasi as $rel) : ?>

                <form action="<?= base_url('pengaturan_admin/update_relasi') ?>" method="post">

                    <div class="form-group row">
                        <label for="kd_gejala" class="col-sm-2 col-form-label">Nama Gejala</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_relasi" value="<?= $rel['id_relasi']; ?>" hidden>
                            <select name="kd_gejala" class="form-control">
                                <option value="<?= $rel['kd_gejala']; ?>"><?= $rel['gejala']; ?></option>
                                <?php foreach ($gejala as $gel) : ?>
                                    <option value="<?= $gel['kd_gejala']; ?>"><?= $gel['gejala']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kd_penyakit" class="col-sm-2 col-form-label">Nama Penyakit</label>
                        <div class="col-sm-10">
                            <select name="kd_penyakit" class="form-control">
                                <option value="<?= $rel['kd_penyakit']; ?>"><?= $rel['nama_penyakit']; ?></option>
                                <?php foreach ($penyakit as $kit) : ?>
                                    <option value="<?= $kit['kd_penyakit']; ?>"><?= $kit['nama_penyakit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bobot" class="col-sm-2 col-form-label">Kategori Gejala</label>
                        <div class="col-sm-10">
                            <select name="bobot" class="form-control">
                                <option value="<?= $rel['bobot']; ?>"><?= $rel['bobot']; ?></option>
                                <option value="5">Gejala Berat</option>
                                <option value="3">Gejala Sedang</option>
                                <option value="1">Gejala Ringan</option>
                            </select>
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