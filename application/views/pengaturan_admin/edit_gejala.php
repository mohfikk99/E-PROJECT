<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php foreach ($gejala as $gel) : ?>

                <form action="<?= base_url('pengaturan_admin/update_gejala') ?>" method="post">

                    <div class="form-group row">
                        <label for="kd_gejala" class="col-sm-2 col-form-label">Kode Gejala</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kd_gejala" name="kd_gejala" value="<?= $gel->kd_gejala; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gejala" class="col-sm-2 col-form-label">Nama Gejala</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gejala" name="gejala" value="<?= $gel->gejala; ?>">
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