<footer class="bg-dark">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <nav class="nav-footer">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="index">Home</a>
                  </li>
                  <li class="list-inline-item">
                     <a href="about">About</a>
                  </li>
               </ul>
            </nav>
            <div class="socials-a">
               <ul class="list-inline">
                  <li class="list-inline-item">
                     <a href="https://www.facebook.com/" target="_blank">
                        <i class="bi bi-facebook" aria-hidden="true"></i>
                     </a>
                  </li>
                  <li class="list-inline-item">
                     <a href="https://www.instagram.com/" target="_blank">
                        <i class="bi bi-instagram" aria-hidden="true"></i>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="copyright-footer">
               <p class="copyright text-white">
                  &copy; Copyright
                  <b>Real Estate</b> All Rights Reserved.
               </p>
            </div>
         </div>
      </div>
   </div>
</footer>
</div>

<!-- jQuery -->
<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- SweetAlert2 -->
<script src="assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/adminlte/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/adminlte/dist/js/adminlte.min.js"></script>
<script>
   $(function() {
      <?php
      $decodedM = isset($_GET['m']) ? base64_decode(urldecode($_GET['m'])) : null;

      if ($decodedM != null) {
         $message = explode('~', $decodedM)[1];
         $design = explode('~', $decodedM)[0];

         if ($design == 'success') {
            echo 'toastr.success("' . $message . '");';
         } else {
            echo 'toastr.error("' . $message . '");';
         }
      }
      ?>
   });
</script>
</body>

</html>