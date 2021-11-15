<?php if (validation_errors()) : ?>
  <div class="alert alert-danger" role="alert">
    <?= validation_errors(); ?>
  </div>
<?php endif; ?>


<div id="contact" class="contact-us section ">
  <div class="container">
    <div class="row">
      <div class="col-sm-2">

      </div>

      <?= $this->session->flashdata('massage'); ?>
      <div class="col-lg-9">
        <div class="section-heading">
          <form id="contact" action="<?= base_url('user/hasil_konsul'); ?>" method="post">
            <h2><span>* Silahkan Pilih Gejala Yang Anda Alami</span></h2>
            <div class="row">
              <?php foreach ($gejala as $g) : ?>
                <div class="col-sm-10">
                  <label for="gejala"><?= $g['gejala']; ?></label> <br>
                </div>
                <div class="col-sm-2">
                  <input type="checkbox" name="kd_gejala[]" id="gejala" value="<?= $g['kd_gejala']; ?>" style="width: 30px;">
                </div>
              <?php endforeach; ?>
            </div>









            <div class="text-center mt-5">
              <button type="submit" class="main-blue-button-hover">Diagnosa</button>
              <input type="reset" value="Reset" class="main-blue-button-hover">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="contact-dec">
    <img src="<?= base_url('assets/'); ?>images/contact-dec.png" alt="">
  </div>
  <div class="contact-left-dec">
    <img src="<?= base_url('assets/'); ?>images/contact-left-dec.png" alt="">
  </div>
</div>