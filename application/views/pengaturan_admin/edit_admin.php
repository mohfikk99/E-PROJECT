<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?php foreach ($admin as $ad) : ?>

                <form action="<?= base_url('pengaturan_admin/update_admin') ?>" method="post">

                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $ad->id; ?>">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $ad->username; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" value="<?= $ad->password; ?>">
                            <input type="hidden" class="form-control" id="level" name="level" value="admin">
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