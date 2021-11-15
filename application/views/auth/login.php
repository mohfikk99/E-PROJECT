<div id="contact" class="contact-us section ">
  <div class="container">
    <div class="row">
      <div class="col-sm-2">

      </div>
      <div class="col-lg-9">
        <div class="section-heading">
          <form id="contact" action="<?= base_url('auth/proses_login'); ?>" method="post">
            <input type="hidden" name="kode" value="0" readonly>
            <h2><span>* Login</span></h2>
            <?php if (isset($error)) {
              echo $error;
            }; ?>
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="name" name="username" id="name" placeholder="Username.." autocomplete="on" required>
                  <?php echo form_error('username'); ?>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="password" name="password" placeholder="Password..." autocomplete="on" required>
                  <?php echo form_error('password'); ?>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Submit Request</button>
                </fieldset>
              </div>
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