<div class="footer-dec">
  <img src="<?= base_url('assets/'); ?>images/footer-dec.png" alt="">
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="copyright">
          <p>Copyright © 2021 Onix Digital Co., Ltd. All Rights Reserved.
            <br>
            Designed by <a rel="nofollow" href="https://templatemo.com" title="free CSS templates">TemplateMo</a><br>
            Distributed by <a href="https://themewagon.com">Themewagon</a>
          </p>
        </div>
      </div>

    </div>
  </div>
</footer>


<!-- Scripts -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/owl-carousel.js"></script>
<script src="<?= base_url('assets/'); ?>js/animation.js"></script>
<script src="<?= base_url('assets/'); ?>js/imagesloaded.js"></script>
<script src="<?= base_url('assets/'); ?>js/custom.js"></script>

<script>
  // Acc
  $(document).on("click", ".naccs .menu div", function() {
    var numberIndex = $(this).index();

    if (!$(this).is("active")) {
      $(".naccs .menu div").removeClass("active");
      $(".naccs ul li").removeClass("active");

      $(this).addClass("active");
      $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

      var listItemHeight = $(".naccs ul")
        .find("li:eq(" + numberIndex + ")")
        .innerHeight();
      $(".naccs ul").height(listItemHeight + "px");
    }
  });
</script>
</body>

</html>