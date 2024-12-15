 <div class="container-fluid">
  <footer class="footer">
   <div class="row">
    <div class="col-md-12 footer-copyright text-center">
     <p class="mb-0">Copyright <?php print $siteYear; ?> ©<?php print $siteName; ?> by <a target="_blank" href="https://centadesk.com/">Centadesk</a></p>
    </div>
   </div>
  </footer>
 </div>
 </div>

 </div>

 </div>

 <div class="modal theme-modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-modal="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
   <div class="modal-content">
    <div class="modal-header">
     <h5>Logging Out</h5>
     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
      <i class="ri-close-line"></i>
     </button>
    </div>
    <div class="modal-body">
     <p class="mb-0">Are you sure you want to log out?</p>
    </div>
    <div class="modal-footer">
     <button class="btn btn-cancel" type="button" data-bs-dismiss="modal"
      aria-label="Close">No</button>
     <button class="btn btn-submit" type="submit" data-bs-dismiss="modal" aria-label="Close"><a href="../../end-current-session">Yes</a></button>
    </div>
   </div>
  </div>
 </div>

 <div class="modal fade theme-modal remove-coupon" id="defaultModal" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
    <div class="modal-header">
     <h5 class="modal-title text-center" id="defaultTitle"></h5>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
      <i class="fas fa-times"></i>
     </button>
    </div>
    <div class="modal-body">
     <div class="remove-box text-center">
      <h4 class="text-content" id="defaultMessage"></h4>
     </div>
    </div>
    <div class="modal-footer">
     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
 </div>

 <script src="assets/js/jquery-3.6.0.min.js"></script>
 <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
 <script src="assets/js/icons/feather-icon/feather.min.js"></script>
 <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
 <script src="assets/js/scrollbar/simplebar.js"></script>
 <script src="assets/js/scrollbar/custom.js"></script>
 <script src="assets/js/config.js"></script>
 <script src="assets/js/tooltip-init.js"></script>
 <script src="assets/js/sidebar-menu.js"></script>
 <script src="assets/js/chart/apex-chart/apex-chart1.js"></script>
 <script src="assets/js/chart/apex-chart/moment.min.js"></script>
 <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
 <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
 <script src="assets/js/chart/apex-chart/chart-custom1.js"></script>
 <script src="assets/js/swiper-bundle.min.js"></script>
 <script src="assets/js/custom-swiper.js"></script>
 <script src="assets/js/customizer.js"></script>
 <script src="assets/js/ratio.js"></script>

 <script src="assets/js/bootstrap-tagsinput.min.js"></script>
 <script src="assets/js/dropzone/dropzone.js"></script>
 <script src="assets/js/dropzone/dropzone-script.js"></script>
 <script src="assets/js/select2.min.js"></script>
 <script src="assets/js/select2-custom.js"></script>
 <script src="assets/js/jquery.dataTables.js"></script>
 <script src="assets/js/custom-data-table.js"></script>

 <script src="assets/js/ckeditor.js"></script>
 <script src="assets/js/ckeditor-custom.js"></script>

 <script src="assets/js/checkbox-all-check.js"></script>

 <script src="assets/js/script.js"></script>

 <script>
  $("#checkall").change(function() {
   var checked = $(this).is(":checked");
   if (checked) {
    $(".custom-checkbox").each(function() {
     $(this).prop("checked", true);
    });

   } else {
    $(".custom-checkbox").each(function() {
     $(this).prop("checked", false);
    });
   }
  });

  function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if (elem && document.createEvent) {
    var evt = document.createEvent("MouseEvents");
    evt.initEvent("click", true, false);
    elem.dispatchEvent(evt);
   }
  }
 </script>